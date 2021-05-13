<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
use Redirect;
use PDF;
use App\Mail\TicketEmail;
use App;

class UserController extends Controller
{
    public function dashboard($id)
    {

        $data=DB::table('users_tbl')->where('id',$id)->get();


        return view('user.dashboard',compact('data'));



    }
    public function settings()
    {

        return view('user.change_password');

    }
    public function change_password_process(Request $req)
    {

        $user_id=Session::get('user_id');

        $check_user=DB::table('users_tbl')->where('id',$user_id)
        ->first();

       
        $old_password=$req->old_password;
        if (Hash::check($old_password,$check_user->password)) {
                
           if($req->new_password==$req->confirm_password)
           {

                $data=array();
                $password=Hash::make($req->new_password);
                $data['password']=$password;

                $change_password = DB::table('users_tbl')
                ->where('id',$user_id)->update($data);

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

        $user_info=DB::table('users_tbl')
        ->where('id',$id)->get();

        return view('user.edit_dashboard',compact('user_info'));

    }
    public function edit_dashboard_process(Request $req,$id)
    {

        $data=array();

        $data['contact']=$req->contact;
        $data['nid']=$req->nid;
        $data['birth_date']=$req->birth_date;
        $data['contact']=$req->contact;


        $update_info=DB::table('users_tbl')->where('id',$id)
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

        return view('user.change_profile_picture');


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

        $update=DB::table('users_tbl')
        ->where('id',$id)->update($data);
        
        if($update)
        {

            $notification = array(
                'message' => 'Successfully Update Image !',
                'alert-type' => 'success'
            );
    
    
            return Redirect::to('user/dashboard/'.$id)->with($notification);


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
    public function purchase_show($id)
    {

        $user_login_status=Session::get('user_login_status');
        $user_id=Session::get('user_id');

        $train=DB::table('trains_tbl')
        ->where('id',$id)
        ->first();

        $form=Session::get('form');
        $to=Session::get('to');
        $class=Session::get('class');
        $date=Session::get('date');
      
        Session::put('train_number',$train->train_number);
        Session::put('train_name',$train->train_name);


        $ticket=DB::table('tickets_tbl')
        ->where('train_number',$train->train_number)
        ->where('class',$class)
        ->where('seat_no','1')
        ->first();

        Session::put('price',$ticket->price);

        $seat_available=Session::get('Seat_available');
        
        
       

        if(!$user_login_status)
        {

            $notification = array(
                'message' => 'Please login first !',
                'alert-type' => 'error'
            );


            return Redirect::to('/login')->with($notification);


        }

        date_default_timezone_set("Asia/Dhaka");
        $current_date=date("Y-m-d");
        $current_time=date("H:i");


        if($date==$current_date)
        {

            if($current_time > $train->arrival_time)
            {

                $notification = array(
                    'message' => 'Train is left !',
                    'alert-type' => 'error'
                );
    
    
                return Redirect::to('/')->with($notification);



            }

           


        }



        return view('user.purchase_show');



    }
    public function confirm_booking(Request $req)
    {
        $count=0;
        $i=1;
        $seat=array();

        $seat_number=1;
       
       
        while($i<=50)
        {

            if(isset($req->seat[$i]))
            {

                $form=Session::get('form');
				$to=Session::get('to');
				$class=Session::get('class');
                $date=Session::get('date');
                $tran_no=Session::get('train_number');


                $available=DB::table('tickets_tbl')
				->where('arrival_station',$form)
				->where('destination_station',$to)
				->where('class',$class)
				->where('date',$date)
				->where('seat_no',$req->seat[$i])
				->where('booking_user',null)
                ->count();

                $available=DB::table('purchases_tbl')
				->where('form',$form)
				->where('to',$to)
				->where('class',$class)
				->where('date',$date)
				->where('train_number',$tran_no)
				->where('seat_number',$i)
				->where('status','Yes')
				->count();

                
                if($available == 1)
                {

                    $notification = array(
                        'message' => 'Ticket already purchased !',
                        'alert-type' => 'error'
                    );
            
            
                    return back()->with($notification);


                }

                $seat[$seat_number]=$i;
                
                $count++;

                $seat_number++;


            }           

            $i++;

        }

        if($count == 0)
        {

            $notification = array(
                'message' => 'Please select any seat !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);


        }

        if($count > 4)
        {

            $notification = array(
                'message' => 'Purchase Maximum 4 tickes !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);


        }

        Session::put('Total_Seat',$count);


        

       for($i=1;$i<$seat_number;$i++)
       {



             Session::put('Seat['.$i.']',$seat[$i]);

                   


       }

       return Redirect::to('/payment');
      
    }

    public function payment_copy($id)
    {

        $payment_info=DB::table('purchases_tbl')
        ->where('tnx_id',$id)->get();


        foreach($payment_info as $row)
        {

            $user=DB::table('users_tbl')
            ->where('id',$row->user_id)
            ->first();


            $details4 = [
                'title' => 'Bangladesh Railway',
                'body' => 'Your Ticket is reserved. Tnx ID - '.$id ,
            ];
           
            \Mail::to($user->email)->send(new \App\Mail\TicketEMail($details4));

            if(1)
            {

            break;

            }


        }

       

        $qrcode = base64_encode(\QrCode::format('svg')->size(120)->errorCorrection('H')->generate($id));


        $pdf = PDF::loadView('user.payment_copy', compact('payment_info','qrcode'));
        
        return $pdf->stream('Bangladesh Railway E-Ticket.pdf');



    }
    public function purchase_history($id)
    {

        $tnx_history=DB::table('purchases_tbl')->where('user_id',$id)
        ->where('status','Yes')->orderBy('id','desc')->get();


        return view('user.purchase_history',compact('tnx_history'));



    }
    public function refound_show($id)
    {



        $ticket=DB::table('purchases_tbl')->where('tnx_id',$id)->get();



        return view('user.refound_ticket',compact('ticket'));




    }
    public function refound_confirm($id, Request $req)
    {
        

       $delete_ticket=DB::table('purchases_tbl')->where('tnx_id',$id)->Delete();



        if($delete_ticket)
        {

            $notification = array(
                'message' => 'Successfully Ticket Refounded !',
                'alert-type' => 'success'
            );

            $data=array();
            $data['bank']=$req->bank;
            $data['account_no']=$req->account_number;
            $data['journey_date']=$req->date;
            $data['form']=$req->form;
            $data['to']=$req->to;
            $data['train_number']=$req->train_number;
            $data['train_name']=$req->train_name;
            $data['seat_number']=$req->seat;


            DB::table('refounds_tbl')->Insert($data);
            
            return Redirect::to('/')->with($notification);

        

        }




    }
}
