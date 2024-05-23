<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Response;
use DateTime;
use DatePeriod;
use DateIntercal;
class EventController extends Controller
{


  public function createevent(Request $request) {
    $skip=0;
    $limit=10;
    $data=DB::table('events')->skip($skip)->limit($limit)->orderby('id','DESC')->paginate(25);


    $total_result=DB::table('events')->count();


    $total_faq=$total_result;
    $per_page=$limit;
    $total_pages= ceil ($total_faq / $per_page); 
    $page=$skip/$limit+1;   
    $url="createevent";
    $keyword="";
    $status='';


    return view('event/createevent',compact('data','page','total_pages','skip','limit','url','keyword','status'));
}


public function updateevent(Request $request,$id) {
    $skip=0;
    $limit=10;
    $data=DB::table('events')->skip($skip)->limit($limit)->paginate(50);
    $event=DB::table('events')->where('id',$id)->first();

    $total_result=DB::table('events')->count();


    $total_faq=$total_result;
    $per_page=$limit;
    $total_pages= ceil ($total_faq / $per_page); 
    $page=$skip/$limit+1;   
    $url="createevent";
    $keyword="";
    $status='';


    return view('event/updateevent',compact('data','page','total_pages','skip','limit','url','keyword','status','event','id'));
}

public function deleteevent(Request $request,$id) {

    $dr=DB::table('events')->where('id',$id)->delete();
    $skip=0;
    $limit=10;
    $data=DB::table('events')->skip($skip)->limit($limit)->paginate(50);
    $event=DB::table('events')->where('id',$id)->first();

    $total_result=DB::table('events')->count();


    $total_faq=$total_result;
    $per_page=$limit;
    $total_pages= ceil ($total_faq / $per_page); 
    $page=$skip/$limit+1;   
    $url="createevent";
    $keyword="";
    $status='';


    return redirect('createevent');
}





public function AddEvent(Request $request) {

   $event_title = $request->get('event_title');
   $event_description = $request->get('event_description');
   $event_date = $request->get('event_date');
   $event_start_time = $request->get('event_start_time');
   $event_end_time = $request->get('event_end_time');
   $event_status = $request->get('event_status');
   $duration = $request->get('duration');
   $location = $request->get('location');
   
   $sql = DB::table('events')->insert(['event_title' => $event_title,
    'event_description' => $event_description,
    'event_date' => $event_date,
    'event_start_time' => $event_start_time,
    'event_end_time'=>"",
    'event_status'=>$event_status,
    'duration'=>$duration,
    'location'=>$location,
    'created_on'=>date("Y-m-d"),
    'Total_Users'=>0
]);



   return redirect('createevent');
}

public function SaveEvent(Request $request) {

   $event_title = $request->get('event_title');
   $id = $request->get('id');
   $event_description = $request->get('event_description');
   $event_date = $request->get('event_date');
   $event_start_time = $request->get('event_start_time');
   $event_end_time = $request->get('event_end_time');
   $event_status = $request->get('event_status');
   $duration = $request->get('duration');
   $location = $request->get('location');
   $sql = DB::table('events')->where('id',$id)->update(array('event_title' => $event_title,
    'event_description' => $event_description,
    'event_date' => $event_date,
    'event_start_time' => $event_start_time,
    'event_end_time'=>"",
    'event_status'=>$event_status,
    'duration'=>$duration,
    'location'=>$location,
    'created_on'=>date("Y-m-d"),
    'Total_Users'=>0));



   return redirect('createevent');
}



public function ViewEvents(Request $request,$skip,$limit) {

    $data=DB::table('events')->skip($skip)->limit($limit)->orderby('id','DESC')->get();


    $total_result=DB::table('events')->count();


    $total_faq=$total_result;
    $per_page=$limit;
    $total_pages= ceil ($total_faq / $per_page); 
    $page=$skip/$limit+1;   
    $url="ViewEvents";
    $keyword="";
    $status='';
    return view('event/viewevents', compact('data','page','total_pages','skip','limit','url','keyword','status'));

}

public function leaderboard(Request $request) {
   $reg = DB::table('events')->where('event_status', 'ACTIVE')->orderBy('id', 'DESC')->first();
   $id = $reg->id;
   // echo $id;
   $id = 2;

   $data = DB::table('registered_users')->where('event_id', $id)->where('start_time', '!=', '0000-00-00 00:00:00')->where('end_time', '!=', '0000-00-00 00:00:00')->where('status', 'APPROVED')->orderBy('score', 'ASC')->get();

   $cdata = DB::table('registered_users')->where('event_id', $id)->where('start_time', '!=', '0000-00-00 00:00:00')->where('end_time', '=', '0000-00-00 00:00:00')->where('status', 'APPROVED')->get();

   $wdata = DB::table('registered_users')->where('event_id', $id)->where('start_time', '=', '0000-00-00 00:00:00')->where('status', 'APPROVED')->get();

   $waitingdata = DB::table('registered_users')->where('event_id', $id)->where('start_time', '=', '0000-00-00 00:00:00')->where('status', 'WAITING')->get();

   $val = DB::table('events')->where('id', $id)->first();
   $duration = $val->duration;

   // Check if $waitingdata is empty
   $waitingdataIsEmpty = $waitingdata->isEmpty();

   return view('leaderboard', compact('data', 'cdata', 'wdata', 'id', 'duration', 'waitingdata', 'waitingdataIsEmpty'));
}



public function leaderboardById(Request $request,$id) {


 $val=DB::table('events')->where('id',$id)->first();
 if(!$val){

     $val=DB::table('events')->where('event_status','ACTIVE')->orderby('id','DESC')->first();
 }
 $duration=$val->duration;
    $data=DB::table('registered_users')->where('event_id',$id)->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00')->where('status','APPROVED')->orderby('score','ASC')->get();


 $cdata=DB::table('registered_users')->where('event_id',$id)->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','=','0000-00-00 00:00:00')->where('status','APPROVED')->get();

 $wdata=DB::table('registered_users')->where('event_id',$id)->where('start_time','=','0000-00-00 00:00:00')->where('status','APPROVED')->get();

 return view('leaderboard',compact('data','cdata','wdata','id','duration'));

}

public function running(Request $request,$id) {

 $val=DB::table('events')->where('id',$id)->first();


    $data=DB::table('registered_users')->where('event_id',$id)->where('start_time','!=','')->where('end_time','!=','')->where('status','APPROVED')->orderby('score','ASC')->get();


 $cdata=DB::table('registered_users')->where('event_id',$id)->where('start_time','!=','')->where('end_time','=','')->where('status','APPROVED')->get();



 $wdata=DB::table('registered_users')->where('event_id',$id)->where('start_time','=','')->where('status','APPROVED')->get();

 return view('leaderboard',compact('data','cdata','wdata','id'));

}



public function ajaxsubmitend(Request $request,$id) {

//echo "<pre>";
  //  return 1;
  //return $request['start_time'];
    //  print_r(DB::getQuerylog());
                        //  DB::enableQuerylog();
/* $request['end_time'];
 $request['start_time'];*/
 $score=str_replace(":",".",$_REQUEST['time']);
 $reg=DB::table('registered_users')
    ->where('id',$id)->first();


    $ev=DB::table('events')
    ->where('id',$reg->event_id)->first();

 $tz = 'Asia/Dubai'; // your required location time zone.
$timestamp = time();
$dtx = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
$dtx->setTimestamp($timestamp); //adjust the object to correct timestamp
$time1= strtotime($dtx->format('Y-m-d H:i:s'));



 $time1 =$reg->start_time;
 $time2 = $dtx->format('Y-m-d H:i:s');

//echo $min= (strtotime($time2)-strtotime($time1)/60;echo "<br>";
$mins= round(abs(strtotime($time2)- strtotime($time1)) / 60,2);

/*    $min=$time1->diff($dtx->format('Y-m-d H:i:s'));
print_r($min);*/
    $array=array('end_time'=>$dtx->format('Y-m-d H:i:s'),'score'=>$score);
    $wdata=DB::table('registered_users')
    ->where('id',$request['id'])
    ->update($array);
 //print_r(DB::getQuerylog());
 $wdatax=DB::table('registered_users')->where('event_id',$reg->event_id)->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','0000-00-00 00:00:00')->where('status','APPROVED')->orderby('score','ASC')->limit(2)->get();
$i=0;
$rank=0;
foreach($wdatax as $wd){
if($wd->id==$id && $i==0){
$rank=1;
}
if($wd->id==$id && $i==1){
$rank=2;
}



$i++;
}



    if($wdata){
       $data=array('status' => 'success',            
            'rank' => $rank);
    }
    else{
             $data=array('status' => 'failed',            
            'rank' => $rank);
    }

    return $data;
}


public function updategamestatus(Request $request,$id) {

//echo "<pre>";
  //  return 1;
  //return $request['start_time'];
    //  print_r(DB::getQuerylog());
                        //  DB::enableQuerylog();


 



    $reg=DB::table('registered_users')
    ->where('id',$id)->first();

     $ev=DB::table('events')
    ->where('id',$reg->event_id)->first();
    $duration=$ev->duration;


   $start_time=$reg->start_time;

 //$end_time= date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));



 $tz = 'Asia/Dubai'; // your required location time zone.
$timestamp = time();
$dtx = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
$dtx->setTimestamp($timestamp); //adjust the object to correct timestamp
$time1= strtotime($dtx->format('Y-m-d H:i:s'));

$time=$dtx->format('H:i');




  // $end_time= strtotime($end_time);
// echo $end_time=date('h:i:s', $end_time);echo "<br>";
/*   $time1 =strtotime($start_time);
  $time2 = strtotime($end_time);

  $sq=$time2 - $time1;*/

 $mins = $duration;


    $array=array('end_time'=>$dtx->format('Y-m-d H:i:s'),'score'=>$mins);
 $wdata=DB::table('registered_users')
    ->where('id',$request['id'])
    ->update($array);
 //print_r(DB::getQuerylog());

//$wdata=1;
  
 $wdatax=DB::table('registered_users')->where('event_id',$reg->event_id)->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','!=','')->where('status','APPROVED')->orderby('score','ASC')->limit(2)->get();
$i=0;
$rank=0;
foreach($wdatax as $wd){
if($wd->id==$id && $i==0){
$rank=1;
}
if($wd->id==$id && $i==1){
$rank=2;
}



$i++;
}


    if($wdata){
       $data=array('status' => 'success',            
            'rank' => $rank);
    }
    else{
             $data=array('status' => 'failed',            
            'rank' => $rank);
    }

    return $data;



}




// public function ajaxsubmitstart(Request $request,$id) {

// //echo "<pre>";

//      $z=DB::table('registered_users')->where('id',$id)->first();
//      $wdatax=DB::table('registered_users')
//     ->where('start_time','!=','0000-00-00 00:00:00')->where('end_time','0000-00-00 00:00:00')->where('event_id',$z->event_id)->count();
// if($wdatax=="0"){


//  $tz = 'Asia/Dubai'; // your required location time zone.
// $timestamp = time();
// $dtx = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
// $dtx->setTimestamp($timestamp); //adjust the object to correct timestamp
// $time1= strtotime($dtx->format('Y-m-d H:i:s'));

// $time=$dtx->format('H:i');



//         $array=array('start_time'=>$dtx->format('Y-m-d H:i:s'));
//     $wdata=DB::table('registered_users')
//     ->where('id',$request['id'])
//     ->update($array);
//     return 1;
// }
// else{

//   return 2;
// }


//   //return $request['start_time'];
//     //  print_r(DB::getQuerylog());
//                         //  DB::enableQuerylog();

//  //print_r(DB::getQuerylog());
    
// }


public function ajaxsubmitstart(Request $request, $id) {
   // Update the status of the user with the given ID to "WAITING"
   $affected = DB::table('registered_users')
                   ->where('id', $id)
                   ->update(['status' => 'WAITING']);

   // Check if the update was successful
   if ($affected > 0) {
       // Return success response
       return 1;
   } else {
       // Return failure response
       return 2;
   }
}

public function ajaxsubmitcomplete(Request $request, $id) {
   // Update the status of the user with the given ID to "WAITING"
   $affected = DB::table('registered_users')
                   ->where('id', $id)
                   ->update(['status' => 'COMPLETED']);

   // Check if the update was successful
   if ($affected > 0) {
       // Return success response
       return 1;
   } else {
       // Return failure response
       return 2;
   }
}



}
