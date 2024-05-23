<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Response;
use View;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
class MainController extends Controller
{



public function dashboard(Request $request, $id) {

$data_event=DB::table('events')->orderby('id','DESC')->get();
if($id==1){
$st="APPROVED";
}
else if($id==2){
$st="REJECTED";
}
else{
$st="PENDING";
}

if($request->get('page')!=''){
$page=$request->get('page');
}
else{
$page=1;
}


DB::enableQueryLog();

$datax=DB::table('registered_users');
if(!empty($request->get('keyword'))){
$keyword=$request->get('keyword');

if(!empty($request->get('event'))){
$event=$request->get('event');
$datax->where([['event_id',$event],['status',$st],['sudo_name','like','%'.$keyword.'%']])->Orwhere([['event_id',$event],['status',$st],['name','like','%'.$keyword.'%']]);


}
else{
$event='';
  $datax->where([['status',$st],['sudo_name','like','%'.$keyword.'%']])->Orwhere([['status',$st],['name','like','%'.$keyword.'%']]);  
}

}
else{
      $keyword='';
if(!empty($request->get('event'))){
$event=$request->get('event');

 $datax->where('status',$st)->where('event_id',$event);  
}
else{
$event='';
     $keyword='';
    $datax->where('status',$st);  
}

 
}



        $data=$datax->orderby('id','asc')->paginate(25);
DB::getQueryLog();
        return view('dashboard',compact('data','page','id','keyword','event','data_event'));
    }


public function nationality(Request $request) {

$datax=DB::table('registered_users')->select('nationality')->groupBy('nationality')->orderby('nationality','ASC')->get();


return view('nationality',compact('datax'));


}
public function age(Request $request) {

$datax=DB::table('registered_users')->select('Age')->groupBy('Age')->orderby('Age','ASC')->get();


return view('age',compact('datax'));


}
public function top3(Request $request) {



if(!empty($request->get('event_date'))){
$event_date=$request->get('event_date');


$data=DB::table('registered_users')->where('rdate',$event_date)->where('status','APPROVED')->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00')->orderby('score','ASC')->orderby('id','ASC')->limit(10)->get();

}

else{
$event_date='';
$data=DB::table('registered_users')->where('status','APPROVED')->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00')->orderby('score','ASC')->orderby('id','ASC')->limit(10)->get();
}



return view('top3',compact('data','event_date'));


}

public function agegroup(Request $request) {

//$datax=DB::table('registered_users')->select('Age')->groupBy('Age')->orderby('Age','ASC')->get();


return view('age_group');


}

public function report(Request $request) {

$data_event=DB::table('events')->orderby('id','DESC')->get();

$cevent=DB::table('events')->orderby('id','DESC')->first();

DB::enableQueryLog();

$datax=DB::table('registered_users');




if(!empty($request->get('event_date'))){
$event_date=$request->get('event_date');
$event=$request->get('event');
$type=$request->get('type');



}

else{
$event_date=date("Y-m-d");
$event=$cevent->id;
$type='4';
}
$datax->where('rdate','like','%'.$event_date.'%');
if($type=="0")
{
//played

}
else if($type=="1")
{
//played
$datax->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00');  
}

else if($type=="2")
{

$datax->where('status','REJECTED');
}
else if($type=="3")
{
$datax->where('start_time','0000-00-00 00:00:00')->where('end_time','0000-00-00 00:00:00')->where('status','APPROVED'); 

}
else if($type=="4")
{

$datax->where('status','APPROVED');
}
else {
   $datax->where('status','APPROVED') ;
}




    
if(!empty($request->get('event_date'))){
$event_date=$request->get('event_date');
}
else{
  $event_date=date("2023-10-09");  
}


$tm=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->sum('team_size');
$tt=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->count();
$m=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('gender','male')->count();
$f=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('gender','female')->count();


$w=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('start_time','0000-00-00 00:00:00')->where('end_time','0000-00-00 00:00:00')->where('status','APPROVED')->count();
$app=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('status','APPROVED')->count();
$rej=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('status','REJECTED')->count();

$pend=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('status','PENDING')->count();
$played=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00')->where('status','APPROVED')->count();






$wx=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('start_time','0000-00-00 00:00:00')->where('end_time','0000-00-00 00:00:00')->where('status','APPROVED')->sum('team_size');
$appx=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('status','APPROVED')->sum('team_size');
$rejx=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('status','REJECTED')->sum('team_size');

$pendx=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('status','PENDING')->sum('team_size');
$playedx=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00')->where('status','APPROVED')->sum('team_size');






    $data=$datax->orderby('id','asc')->get();


    $total_nationalities=DB::table('registered_users')->distinct('nationality')->orderby('nationality','ASC')->count();



DB::getQueryLog();
        return view('report',compact('data','event','event_date','type','data_event','tm','tt','w','m','f','app','rej','played','pend','wx','appx','rejx','playedx','pendx','total_nationalities'));
    }






public function regusers(Request $request, $id,$type='') {

if($id==1){
$st="APPROVED";
}
else if($id==2){
$st="REJECTED";
}
else{
$st="PENDING";
}

if($request->get('page')!=''){
$page=$request->get('page');
}
else{
$page=1;
}


if($type!=''){
   if($type=="2"){
$data=DB::table('registered_users')->where('event_id',$id)->where('status','APPROVED')->orderby('score','asc')->paginate(5);
   } 
   else if($type=="1"){
$data=DB::table('registered_users')->where('event_id',$id)->where('status','REJECTED')->orderby('id','desc')->paginate(25);
   }
}
else{
      $data=DB::table('registered_users')->where('event_id',$id)->orderby('id','asc')->paginate(25);

}
        $tnu=DB::table('registered_users')->where('score','<',1)->count();
        $tbu=DB::table('registered_users')->where('score','>',1)->count();

        $tu=DB::table('registered_users')->count();

  

        return view('registeredusers',compact('tnu','tbu','tu','data','page','id'));
    }





    public function analytics(Request $request) {

if(!empty($request->get('event_date')))
{

     $event_date=$request->get('event_date');
        $tusers=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->count();
  
        $allusers=DB::table('registered_users')->where('rdate','like','%'.$event_date.'%')->orderby('timestamp','DESC')->distinct('timestamp')->get();

         $data= $event=DB::table('events')->limit(10)->get();
}
else{
        $tusers=DB::table('registered_users')->count();
  
        $allusers=DB::table('registered_users')->orderby('timestamp','DESC')->distinct('timestamp')->get();

         $data= $event=DB::table('events')->limit(10)->get();
         $event_date='';
     }
    

        return view('Report/analytics',compact('tusers','allusers','data','event_date'));

    }


    public  function logout() {
       $token = session()->get('token');
       $curl = curl_init();

       Auth::logout();
       return redirect('/');
   }

   public  function login() {
    return view('login_new');
}


   public  function edituser($id) {
$tu=DB::table('registered_users')->where('id',$id)->first();
$country=DB::table('countries')->orderby('name','ASC')->get();
    return view('Users/updateuser',compact('id','tu','country'));
}


function checklogin(Request $request){



     $useremail = $request->get('email');
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|alphaNum|min:3'
    ]);

    $user_data = array(
        'email' => $request->get('email'),
        'password' => $request->get('password')
    );
print_r($user_data);
    if (Auth::attempt($user_data)) {
        $userid = DB::table('users')->where('email', '=', $useremail)->value('id');
         $ui = DB::table('users')->where('email', '=', $useremail)->first();
print_r($userid);
        Session(['userid' => $userid]);
        Session(['username' => $useremail]);
        //  Session(['role' => $ui->role]);
        return redirect('/dashboard/0');
    }
    else{
        return back()->with('error', 'Wrong Login Details Found Here');
    }
}


function checkloginx(Request $request) {
    $useremail = $request->get('email');
    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|alphaNum|min:3'
    ]);
    $user_data = array(
        'email' => $request->get('email'),
        'password' => $request->get('password')
    );

    if (Auth::attempt($user_data)) {
        $userid = DB::table('users')->where('email', '=', $useremail)->value('id');
        $active = DB::table('users')->where('email', '=', $useremail)->value('active');
        $role = DB::table('users')->where('email', '=', $useremail)->value('role');
        if ($role == '1' || $role == '3' || $role == '4') {
            Auth::logout();
            return back()->with('error', 'You are not allowed to login.');
        } else if ($active == '1') {
            Session(['userid' => $userid]);
            Session(['role' => $role]);
            return redirect('home');
        } else {
            Auth::logout();
            return back()->with('error', 'Your account is not active. Please contact admin.');
        }
    } else {
            $hashed = Hash::make($request->get('password')); //Hashed value of password
            return back()->with('error', 'Wrong Login Details Found Here');
        }
    }





public function updateuserdata(Request $request) {

      
        $name = $request->get('name');
        $email = $request->get('email');
        $sudo_name = $request->get('sudo_name');
        $gender = $request->get('gender');
        $mobile_no = $request->get('mobile_no');
        $age = $request->get('age');        
        $team_size = $request->get('team_size');
        $nationality = $request->get('nationality');
      $id = $request->get('id');


    


    $reg_id = DB::table('registered_users')->where('id',$id)->update(['name' => "$name",
        'sudo_name' => $sudo_name,
        'gender' => $gender,
        'email' => $email,
        'mobile_no'=>$mobile_no,
        'Age'=>$age,       
        'team_size'=>$team_size,
        'nationality'=>$nationality
        
    ]);

return redirect('/dashboard/1');

}


}
