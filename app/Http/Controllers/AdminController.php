<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Hash;
use Session;

class AdminController extends Controller
{   
    public function dashboard($id)
    {

        $data=DB::table('admins_tbl')->where('id',$id)->get();


        return view('admin.dashboard',compact('data'));



    }
    public function settings()
    {

        return view('admin.change_password');

    }
    public function change_password_process(Request $req)
    {

        $admin_id=Session::get('admin_id');

        $check_user=DB::table('admins_tbl')->where('id',$admin_id)
        ->first();

       
        $old_password=$req->old_password;
        if (Hash::check($old_password,$check_user->password)) {
                
           if($req->new_password==$req->confirm_password)
           {

                $data=array();
                $password=Hash::make($req->new_password);
                $data['password']=$password;

                $change_password = DB::table('admins_tbl')
                ->where('id',$admin_id)->update($data);

                $notification = array(
                    'message' => 'Successfully Change Password !',
                    'alert-type' => 'success'
                );
        
        
                return back()->with($notification);

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
                'message' => 'Wrong password !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);


        }



    }
    public function edit_dashboard($id)
    {

        $admin_info=DB::table('admins_tbl')
        ->where('id',$id)->get();

        return view('admin.edit_dashboard',compact('admin_info'));

    }
    public function edit_dashboard_process(Request $req,$id)
    {

        $data=array();

        $data['contact']=$req->contact;
        $data['nid']=$req->nid;
        $data['birth_date']=$req->birth_date;
        $data['contact']=$req->contact;


        $update_info=DB::table('admins_tbl')->where('id',$id)
        ->update($data);

        if($update_info)
        {

            $notification = array(
                'message' => 'Successfully Update Info !',
                'alert-type' => 'success'
            );
    
    
            return back()->with($notification);



        }
        else
        {

            $notification = array(
                'message' => 'Already save same Info !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);


        }



    }
    public function change_profile_picture($id)
    {

        return view('admin.change_profile_picture');


    }
    public function update_profile_picture(Request $req,$id)
    {

        $image=$req->picture;
        $image_name=hexdec(uniqid());
        $ext=strtolower($image->getClientOriginalExtension());
        $image_full_name=$image_name.'.'.$ext;
        $upload_path='public/image/';
        $image_url=$upload_path.$image_full_name;
        //file upload in project folder
         $upload=$image->move($upload_path,$image_full_name);
        //file url upload in database
        $data=array();
        $data['photo']=$image_url;

        $update=DB::table('admins_tbl')
        ->where('id',$id)->update($data);
        
        if($update)
        {

            $notification = array(
                'message' => 'Successfully Update Image !',
                'alert-type' => 'success'
            );
    
    
            return Redirect::to('admin/dashboard/'.$id)->with($notification);


        }
        else
        {

            $notification = array(
                'message' => 'Already have same Image !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);
            


        }
    }
    public function train_add()
    {

        return view('admin.train_add');


    }
    public function train_add_process(Request $req)
    {

        $already_train=DB::table('trains_tbl')
        ->where('train_number',$req->train_number)
        ->count();


        if($req->arrival_station == $req->destination_station)
        {

            $notification = array(
                'message' => 'Invalid Route !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);            


        }

       

        if($already_train > 0)
        {

            $notification = array(
                'message' => 'Train number is already available !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);             


        }


        $data=array();
        $data['train_number']=$req->train_number;
        $data['train_name']=$req->train_name;
        $data['arrival_station']=$req->arrival_station;
        $data['destination_station']=$req->destination_station;
        $data['arrival_time']=$req->arrival_time;
        $data['destination_time']=$req->destination_time;

        $add=DB::table('trains_tbl')->Insert($data);

        $notification = array(
            'message' => 'Successfully Train Added !',
            'alert-type' => 'success'
        );
        
        return back()->with($notification);             


    }

    public function sell_ticket()
    {

        $train_list=DB::table('trains_tbl')->get();


        return view('admin.sell_ticket',compact('train_list'));


    }
    public function sell_ticket_process($id)
    {

        $train=DB::table('trains_tbl')->where('id',$id)->get();


        return view('admin.sell_ticket_process',compact('train'));



    }
    public function sell_ticket_confirm(Request $req,$id)
    {

        $already_train=DB::table('tickets_tbl')
        ->where('date',$req->date)->where('train_number',$req->train_number)
        ->count();

        if($already_train > 0)
        {

            $notification = array(
                'message' => 'Ticket Already Sell !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);             


        }

        $data=array();
        $data['train_number']=$req->train_number;
        $data['train_name']=$req->train_name;
        $data['arrival_station']=$req->arrival_station;
        $data['destination_station']=$req->destination_station;
        $data['arrival_time']=$req->arrival_time;
        $data['destination_time']=$req->destination_time;

        $data['date']=$req->date;

        $ticket=0;

        while($ticket < 50)
        {

            $data['class']='S_CHAIR';
            $data['price']=360.00;
            $data['seat_no']=$ticket+1;
            
            DB::table('tickets_tbl')->Insert($data);

            $data['class']='SNIGDHA';
            $data['price']=725.00;
            $data['seat_no']=$ticket+1;
            
            DB::table('tickets_tbl')->Insert($data);

            $data['class']='SHOVAN';
            $data['price']=285.00;
            $data['seat_no']=$ticket+1;
            
            DB::table('tickets_tbl')->Insert($data);

            $data['class']='AC_S';
            $data['price']=885.00;
            $data['seat_no']=$ticket+1;
            
            DB::table('tickets_tbl')->Insert($data);

            $data['class']='AC_B';
            $data['price']=1225.00;
            $data['seat_no']=$ticket+1;
            
            DB::table('tickets_tbl')->Insert($data);


            $ticket++;


        }  
            
        $notification = array(
            'message' => 'Successfully Sell Ticket !',
            'alert-type' => 'success'
        );
        
        return back()->with($notification);


    }
    public function refound_ticket()
    {

        $data=DB::table('refounds_tbl')->get();


        return view('admin.refound_ticket',compact('data'));



    }
    public function cash_back($id)
    {

        $delete=DB::table('refounds_tbl')->Where('id',$id)->Delete();

        $notification = array(
            'message' => 'Successfully Cash Back !',
            'alert-type' => 'success'
        );
        
        return back()->with($notification);



    }
    public function admin_list()
    {

        $admin=DB::table('admins_tbl')->get();

        return view('admin.admin_list',compact('admin'));



    }
    public function change_power($id)
    {

        $admin=DB::table('admins_tbl')->where('id',$id)->get();


        return view('admin.admin_power',compact('admin'));

    }
    public function confirm_power($id, Request $req)
    {

        $data['admin_status']=$req->admin_status;
        

        $update=DB::table('admins_tbl')->where('id',$id)->Update($data);


        if($update)
        {

            $notification = array(
                'message' => 'Successfully Updated Status !',
                'alert-type' => 'success'
            );
            
            return back()->with($notification);



        }
        else{


            $notification = array(
                'message' => 'Already status is available !',
                'alert-type' => 'error'
            );
            
            return back()->with($notification);



        }



    }
}
