<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller {

    public function getAllActiveUsers(Request $request,$skip,$limit) {
        $response=DB::table('registered_users')->orderby('id','DESC')->skip($skip)->limit($limit)->get();
    $data = json_decode($response);
        //print_r($data);
    $total_users=DB::table('registered_users')->count();
    $total_users=$total_users;
    $per_page=$limit;
    $total_pages= ceil ($total_users / $per_page); 
    $page=$skip/$limit+1;   
    $url="getAllActiveUsers";
    $keyword="";
    $status="";
    return view('Users/users', compact('data','page','total_pages','skip','limit','url','total_users','keyword','status'));
    
}

public function changeStatus(Request $request, $id, $status,$event=NULL) {

if($status=="APPROVED"){

$reg=DB::table('registered_users')->where('id',$id)->first();
$event_id=$reg->event_id;
$data=DB::table('events')->where('event_status','ACTIVE')->where('id',$event_id)->first();

  $wdata=DB::table('registered_users')->where('event_id',$event_id)->where('start_time','=','0000-00-00 00:00:00')->where('id','<',$id)->where('status','APPROVED')->count();


   
$k=$wdata;
    $tu=$wdata+1;


$tz = 'Asia/Dubai'; // your required location time zone.
$timestamp = time();
$dtx = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
$dtx->setTimestamp($timestamp); //adjust the object to correct timestamp
$time_now= strtotime($dtx->format('Y-m-d H:i:s'));


if($tu==1){
$min=$data->duration*$k;
    //$alloted_time =$data->event_date." ".$data->event_start_time;
$alloted_time=$dtx->format('Y-m-d H:i:s');
   $qno=1;
}
else{
 
   $min=$data->duration*$k;
    //$alloted_time =$data->event_date." ".date("H:i:s",strtotime($data->event_start_time." +".$min." minutes"));
   $alloted_time =$dtx->format('Y-m-d')." ".date("H:i:s",strtotime($dtx->format('H:i:s')." +".$min." minutes"));

    $qno=$wdata+1;



}
$at=str_replace(": ",":",$alloted_time);
 $response=DB::table('registered_users')->where('id',$id)->update(array('status'=>$status,'alloted_time'=>$at,
        'QueueNo'=>$qno)); 

}

else{

 $response=DB::table('registered_users')->where('id',$id)->update(array('status'=>$status));

}





 if($status=="APPROVED"){
    $st="0";
 }
 else  if($status=="REJECTED"){
    $st="2";
 }
 else {
    $st="1";
 }

 if(!empty($event)){
   return redirect('/dashboard/'.$st.'?event='.$event); 
 }
 else{
   return redirect('/dashboard/'.$st);  
 }   
}


public function profile(Request $request) {
    
 $data=DB::table('users')->where('active',1)->get();


    return view('Users/profile',compact('data'));
}


public function createuser(Request $request) {
  

  $chk=DB::table('users')->where('username',$request->username)->count();
  if($chk==0){  
 $user2=array( 'username' => $request->username,  'name' => $request->username,  'email' => $request->username, 'role'=>2,'active'=>1,
            'password' => Hash::make($request->password));
$userid = DB::table('users')->insertGetId($user2);
}
else
{
    $request->session()->put('errors', ['User Already Exists']);
}
 $data=DB::table('users')->where('active',1)->get();

    return view('Users/profile',compact('data'));
}


public function resetpassword(Request $request,$id) {
    
 $data=DB::table('users')->where('active',1)->get();

 $dt=DB::table('users')->where('id',$id)->first();
    return view('Users/profile',compact('data','dt'));
}


public function updatepassword(Request $request) {
    
 $chk=DB::table('users')->where('id',$request->id)->count();
  if($chk==1){  
 $user2=array( 
            'password' => Hash::make($request->password));
$userid = DB::table('users')->insertGetId($user2);
}
else
{
    $request->session()->put('errors', ['User Does Not Exists']);
}
 $data=DB::table('users')->get();
 
    return view('Users/profile',compact('data'));
}


public function deleteuser(Request $request,$id) {
    
 $chk=DB::table('users')->where('id',$id)->count();
  if($chk==1){  
 $user2=array('active' => 0);
$userid = DB::table('users')->where('id',$id)->update($user2);
}
else
{
    $request->session()->put('error', ['User Does Not Exists']);
}
 $data=DB::table('users')->where('active',1)->get();
 
return view('Users/profile',compact('data'));
}


}
