<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use Hash;
use App\Mail\MessageEmail;
use DB;

class GuestController extends Controller
{
    public function contact_us()
    {

        return view('contact_us');



    }
    public function train_show(Request $req)
    {

        if($req->arrival_station==$req->destination_station)
        {

            $notification = array(
                'message' => 'Invalid Route !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);



        }
        if($req->arrival_station=="")
        {

            $notification = array(
                'message' => 'Invalid Route  !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);            


        }
        if($req->destination_station=="")
        {

            $notification = array(
                'message' => 'Invalid Route !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);            


        }
        if($req->class=="")
        {

            $notification = array(
                'message' => 'Please any class select !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification);            


        }
        
        $route=DB::table('trains_tbl')
        ->where('arrival_station',$req->arrival_station)
        ->where('destination_station',$req->destination_station)
        ->count();

        if($route == 0)
        {

            $notification = array(
                'message' => 'No Train is available !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification); 


        }
        $ticket=DB::table('tickets_tbl')
        ->where('arrival_station',$req->arrival_station)
        ->where('destination_station',$req->destination_station)
        ->where('date',$req->date)
        ->count();

        if($ticket == 0)
        {

            $notification = array(
                'message' => 'No Ticket is available !',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification); 


        }
        $route=DB::table('trains_tbl')
        ->where('arrival_station',$req->arrival_station)
        ->where('destination_station',$req->destination_station)
        ->get();

        $train_list=DB::table('tickets_tbl')
        ->where('arrival_station',$req->arrival_station)
        ->where('destination_station',$req->destination_station)
        ->where('date',$req->date)
        ->get();

        $seat=DB::table('tickets_tbl')
        ->where('arrival_station',$req->arrival_station)
        ->where('destination_station',$req->destination_station)
        ->where('date',$req->date)
        ->where('class',$req->class)
        ->count();

        Session::put('form',$req->arrival_station);
        Session::put('to',$req->destination_station);
        Session::put('class',$req->class);
        Session::put('date',$req->date);


        return view('Guest.train_show',compact('route','train_list','seat'));


    }
    public function message(Request $req)
    {

        $data['name']=$req->name;
        $data['email']=$req->email;
        $data['message']=$req->message;


        $message=DB::table('contact_us_tbl')->Insert($data);


        if($message)
        {

            $details5 = [
                'title' => 'Bangladesh Railway',
                'body' => ' We will contact with you soon ' ,
            ];
           
            \Mail::to($req->email)->send(new \App\Mail\MessageEMail($details5));


            $notification = array(
                'message' => 'Succefully Send Message ',
                'alert-type' => 'success'
            );
    
    
            return back()->with($notification); 


        }

    }
    public function verify_ticket()
    {


        return view('Guest.Verify_ticket');


    }
    public function verify_check(Request $req)
    {

        $tnx_id=$req->tnx_id;

        $verify=DB::table('purchases_tbl')->where('tnx_id',$tnx_id)
        ->where('status','Yes')
        ->count();


        if($verify > 0)
        {

            
            $notification = array(
                'message' => 'Verified Ticket ! ',
                'alert-type' => 'success'
            );
    
    
            return back()->with($notification); 



        }
        else
        {

            $notification = array(
                'message' => 'Invalid Ticket ! ',
                'alert-type' => 'error'
            );
    
    
            return back()->with($notification); 


        }




    }
}
