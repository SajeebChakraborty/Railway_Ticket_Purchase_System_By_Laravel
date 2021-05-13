<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Mail\VerifyEmail;
use App\Mail\ForgetPasswordMail;
use DB;
use Hash;
use Redirect;

class AuthController extends Controller
{
    public function login_page_show()
    {

        return view('Auth.login_page');        


    }
    public function sign_up_page_show()
    {

        return view('Auth.sign_up_page');


    }
    public function sign_up_process(Request $req)
    {

        $already_reg=DB::table('users_tbl')->where('email',$req->email)->count();


        if($already_reg > 0)
        {

            $notification = array(
                'message' => 'Email already registered !',
                'alert-type' => 'error'
            );


            Session::put('already_reg','yes');
            return back()->with($notification);

        }

      

        Session::put('name',$req->name);
        Session::put('email',$req->email);
        Session::put('contact',$req->contact);
        Session::put('nid',$req->nid);
        Session::put('birth_date',$req->birth_date);
        Session::put('password',$req->password);

        $code=rand(1000,9999);

        Session::put('verify_code',$code);

        $details = [
            'title' => 'Bangladesh Railway',
            'body' => 'Confirmation Code - '.$code
        ];
       
        \Mail::to($req->email)->send(new \App\Mail\VerifyEmail($details));

        return Redirect::to('/user/verify-email');



    }
    public function verify_email()
    {

        
        return view('Auth.verify_email_page');



    }
    public function confirm_email(Request $req)
    {


        $name=Session::get('name');
        $email=Session::get('email');
        $contact=Session::get('contact');
        $nid=Session::get('nid');
        $birth_date=Session::get('birth_date');
        $password=Session::get('password');
        $verify_code=Session::get('verify_code');

        if($verify_code==$req->code)
        {

            $data=array();

            $data['name']=$name;
            $data['email']=$email;
            $data['contact']=$contact;
            $data['nid']=$nid;
            $data['birth_date']=$birth_date;
            $password=Hash::make($password);
            $data['password']=$password;
            $data['verify_code']=$verify_code;


            $reg=DB::table('users_tbl')->Insert($data);

            if($reg)
            {

                $user_id=DB::getPdo()->lastInsertId();

                Session::put('user_login_status','yes');
                Session::put('user_id',$user_id);

                $data=array();

                $data['email_verify']="yes";

                $update=DB::table('users_tbl')->where('id',$user_id)->update($data);

                $notification = array(
                    'message' => 'Successfully Account Created !',
                    'alert-type' => 'success'
                );
        

                return Redirect::to('user/dashboard/'.$user_id)->with($notification);


            }


        }
        else{

            $notification = array(
                'message' => 'Invalid Verification Code !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }



    }
    public function login_process(Request $req)
    {

        $email=$req->email;
        $password=$req->password;

        $correct_email=DB::table('users_tbl')->where('email',$email)->count();

        if($correct_email > 0)
        {

            
            $correct_password=DB::table('users_tbl')->where('email',$email)
            ->first();

            if (Hash::check($password, $correct_password->password)) {
                
                $login_info=DB::table('users_tbl')->where('email',$email)
                ->first();

                Session::put('user_login_status','yes');
                Session::put('user_id',$login_info->id);

                $notification = array(
                    'message' => 'Successfully Login !',
                    'alert-type' => 'success'
                );
        
        

                return Redirect::to('/')->with($notification);

            }
            else
            {

                $notification = array(
                    'message' => 'Password do not match !',
                    'alert-type' => 'error'
                );
    
                return back()->with($notification);


            }


        }
        else
        {

            $notification = array(
                'message' => 'Email is not registed !',
                'alert-type' => 'error'
            );

            return back()->with($notification);


        }


    }
    public function logout()
    {

        Session::put('user_login_status',null);
        Session::put('user_id',null);

        $notification = array(
            'message' => 'Successfully Logout !',
            'alert-type' => 'success'
        );


        return Redirect::to('/')->with($notification);


    }
    
    public function admin_login_page_show()
    {

        return view('Auth.admin_login_page');


    }
    public function admin_sign_up_page_show()
    {

        return view('Auth.admin_sign_up_page');


    }
    public function admin_sign_up_process(Request $req)
    {

        $already_reg=DB::table('admins_tbl')->where('email',$req->email)->count();


        if($already_reg > 0)
        {

            $notification = array(
                'message' => 'Email already registered !',
                'alert-type' => 'error'
            );


            Session::put('already_reg','yes');
            return back()->with($notification);

        }
        if($req->controller_pin != "scb_2020")
        {

            $notification = array(
                'message' => 'Invalid Contoller Pin !',
                'alert-type' => 'error'
            );


            //Session::put('already_reg','yes');
            return back()->with($notification);

        }
       
      

        Session::put('admin_name',$req->name);
        Session::put('admin_email',$req->email);
        Session::put('admin_contact',$req->contact);
        Session::put('admin_nid',$req->nid);
        Session::put('admin_birth_date',$req->birth_date);
        Session::put('admin_password',$req->password);
        Session::put('admin_power_status','Station Admin');


        $code=rand(1000,9999);

        Session::put('admin_verify_code',$code);

        $details = [
            'title' => 'Bangladesh Railway',
            'body' => 'Confirmation Code - '.$code
        ];
       
        \Mail::to($req->email)->send(new \App\Mail\VerifyEmail($details));

        return Redirect::to('/admin/verify-email');        


    }
    public function admin_verify_email()
    {

        
        return view('Auth.admin_verify_email_page');



    }
    public function admin_confirm_email(Request $req)
    {


        $name=Session::get('admin_name');
        $email=Session::get('admin_email');
        $contact=Session::get('admin_contact');
        $nid=Session::get('admin_nid');
        $birth_date=Session::get('admin_birth_date');
        $password=Session::get('admin_password');
        $verify_code=Session::get('admin_verify_code');

        if($verify_code==$req->code)
        {

            $data=array();

            $data['name']=$name;
            $data['email']=$email;
            $data['contact']=$contact;
            $data['nid']=$nid;
            $data['birth_date']=$birth_date;
            $password=Hash::make($password);
            $data['password']=$password;
            $data['verify_code']=$verify_code;
            $data['admin_status']='Station Admin';


            $reg=DB::table('admins_tbl')->Insert($data);

            if($reg)
            {

                $admin_id=DB::getPdo()->lastInsertId();

                Session::put('admin_login_status','yes');
                Session::put('admin_id',$admin_id);

                $data=array();

                $data['email_verify']="yes";

                $update=DB::table('admins_tbl')->where('id',$admin_id)->update($data);

                $notification = array(
                    'message' => 'Successfully Account Created !',
                    'alert-type' => 'success'
                );
        

                return Redirect::to('/admin/dashboard/'.$admin_id)->with($notification);


            }


        }
        else{

            $notification = array(
                'message' => 'Invalid Verification Code !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }



    }
    public function admin_logout()
    {

        Session::put('admin_login_status',null);
        Session::put('admin_power_status',null);
        Session::put('admin_id',null);

        $notification = array(
            'message' => 'Successfully Logout !',
            'alert-type' => 'success'
        );


        return Redirect::to('/admin/login')->with($notification);


    }
    public function admin_login_process(Request $req)
    {

        $email=$req->email;
        $password=$req->password;

        $correct_email=DB::table('admins_tbl')->where('email',$email)->count();

        if($correct_email > 0)
        {

            
            $correct_password=DB::table('admins_tbl')->where('email',$email)
            ->first();

            if (Hash::check($password, $correct_password->password)) {
                
                $login_info=DB::table('admins_tbl')->where('email',$email)
                ->first();

                Session::put('admin_login_status','yes');
                Session::put('admin_id',$login_info->id);
                Session::put('admin_power_status',$login_info->admin_status);


                $notification = array(
                    'message' => 'Successfully Login !',
                    'alert-type' => 'success'
                );
        
        

                return Redirect::to('admin/dashboard/'.$login_info->id)->with($notification);

            }
            else
            {

                $notification = array(
                    'message' => 'Password do not match !',
                    'alert-type' => 'error'
                );
    
                return back()->with($notification);


            }


        }
        else
        {

            $notification = array(
                'message' => 'Email is not registed !',
                'alert-type' => 'error'
            );

            return back()->with($notification);


        }


    }
    public function forget_password()
    {

        return view('Auth.forget_password');

    }
    public function reset_password(Request $req)
    {

        $link=hexdec(uniqid());

        Session::put('user_link',$link);


        $account=DB::table('users_tbl')
        ->where('email',$req->email)
        ->count();

        if($account == 0)
        {

            $notification = array(
                'message' => 'Email is not registered !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }

        $user=DB::table('users_tbl')
        ->where('email',$req->email)
        ->first();

        Session::put('forget_user_id',$user->id);

        $details2 = [
            'title' => 'Bangladesh Railway',
            'body' => 'Reset Password Link - http://localhost:8000/user/reset-password/'.$link.'/'.$user->id
        ];
       
        \Mail::to($req->email)->send(new \App\Mail\ForgetPasswordMail($details2));


        $notification = array(
            'message' => 'Email already sent !',
            'alert-type' => 'success'
        );

        return back()->with($notification);


    }
    public function reset_password_process()
    {

        return view('Auth.reset_password_page');


    }
    public function reset_password_confirm(Request $req)
    {
        $id=Session::get('forget_user_id');

        if($req->new_password == $req->confirm_password)
        {
            $password=Hash::make($req->new_password);

            $data=array();

            $data['password']=$password;
            $update=DB::table('users_tbl')->where('id',$id)->update($data);


            $notification = array(
                'message' => 'Successfully Reset Password !',
                'alert-type' => 'success'
            );

            return Redirect::to('/user/dashboard/'.$id)->with($notification);

        }
        $notification = array(
            'message' => 'Password do not match !',
            'alert-type' => 'error'
        );

        return back()->with($notification);



    }
    public function admin_forget_password()
    {

        return view('Auth.admin_forget_password');

    }
    public function admin_reset_password(Request $req)
    {

        $link=hexdec(uniqid());

        Session::put('admin_link',$link);


        $account=DB::table('admins_tbl')
        ->where('email',$req->email)
        ->count();

        if($account == 0)
        {

            $notification = array(
                'message' => 'Email is not registered !',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);


        }

        $admin=DB::table('admins_tbl')
        ->where('email',$req->email)
        ->first();

        Session::put('forget_admin_id',$admin->id);

        $details2 = [
            'title' => 'Bangladesh Railway',
            'body' => 'Reset Password Link - http://localhost:8000/admin/reset-password/'.$link.'/'.$admin->id
        ];
       
        \Mail::to($req->email)->send(new \App\Mail\ForgetPasswordMail($details2));


        $notification = array(
            'message' => 'Email already sent !',
            'alert-type' => 'success'
        );

        return back()->with($notification);


    }
    public function admin_reset_password_process()
    {

        return view('Auth.admin_reset_password_page');


    }
    public function admin_reset_password_confirm(Request $req)
    {
        $id=Session::get('forget_admin_id');

        if($req->new_password == $req->confirm_password)
        {
            $password=Hash::make($req->new_password);

            $data=array();

            $data['password']=$password;
            $update=DB::table('admins_tbl')->where('id',$id)->update($data);


            $notification = array(
                'message' => 'Successfully Reset Password !',
                'alert-type' => 'success'
            );

            return Redirect::to('/admin/dashboard/'.$id)->with($notification);

        }
        $notification = array(
            'message' => 'Password do not match !',
            'alert-type' => 'error'
        );

        return back()->with($notification);



    }

}
