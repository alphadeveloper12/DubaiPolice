 
@include('layout.header') 
@include('layout.menu') 
<!-- Preloader -->


<div class="container my-5">
  <div class="row">
    <div>
      <h1 class="page-title mb-4">Report</h1>
    </div>
 <div class="row">
   <div class="col-3"><b><a href="{{url('/nationality')}}">Nationality</a></b></div>
   <div class="col-3"><b><a href="{{url('/age')}}">Age</a></b></div>
   <div class="col-3"><b><a href="{{url('/agegroup')}}">Age Group</a></b></div>
   <div class="col-3"><b><a href="{{url('/top3')}}">Top 10</a></b></div>
</div>

    <div class="bg-white p-2 rounded col-6">
     <form method="get" action="{{ url('/report') }}" autocomplete = "OFF">
      @csrf
      <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
        <div class="input-group">
          <input type="date" placeholder="select date" aria-describedby="button-addon1" class="form-control border-0 bg-light  " name="event_date" required value="{{$event_date}}">


          <select name="event" class="form-control border-0 bg-light  " required>
           <option>Select Event</option>
           <?php foreach ($data_event as $eve){

            ?>

            <option value="{{$eve->id}}" <?php if($eve->id=="$event") { ?>selected<?php }?>>{{$eve->event_title}}</option>
            <?php
          }
          ?>

        </option>
      </select>


      <select name="type" class="form-control border-0 bg-light  " required>
       <option>Select Type</option>
       <option value="0" <?php if($type=="0") { ?>selected<?php }?>>ALL</option>
       <option value="1" <?php if($type=="1") { ?>selected<?php }?>>Played</option>
       <option value="2" <?php if($type=="2") { ?>selected<?php }?>>Rejected</option>
       <option value="3" <?php if($type=="3") { ?>selected<?php }?>>Waiting</option>
       <option value="4" <?php if($type=="4") { ?>selected<?php }?>>Approved</option>
     </select>


     <div class="input-group-append">
      <button id="button-addon1" type="submit" class="btn btn-link text-success"><i class="fa fa-search"></i></button>
    </div>

  </div>
</div>
</form>
</div>



<?php

$total_members=DB::table('registered_users')->sum('team_size');
$total_teams=DB::table('registered_users')->count();
$total_males=DB::table('registered_users')->where('gender','male')->count();
$total_females=DB::table('registered_users')->where('gender','female')->count();


?>
       <div class="col-12 row">
          <div class="table-responsive col-4">
<table  style="width: 100%" class="table table-responsive"><tr>
  <td>OverAll</td><td></td></tr>
  <tr>
    <td>Total Members </td><td>{{$total_members}}</td></tr>
    <tr>
      <td>Total Teams</td><td>{{$total_teams}}</td></tr>
      <tr>
        <td>Teams Males</td><td>{{$total_males}} ({{number_format($total_males/$total_teams*100,2)}} % ) </td></tr>
        <tr>
          <td>Teams Females</td><td>{{$total_females}} ({{number_format($total_females/$total_teams*100,2)}} % )</td></tr>
  <tr><td>Teams Nationalities</td><td>{{$total_nationalities}} </td></tr>
        </table>
       
 </div>
 <div class="table-responsive col-8">
            <table style="width: 100%" class="table table-condensed">
            <tr>
              <td>{{$event_date}}</td><td>Team</td><td>Members</td></tr>
              <tr>
                <td>Total  </td><td>{{$tt}}</td><td>{{$tm}}</td></tr>
     
                  <tr>

                    <td>Total Approved</td><td>{{$app}}</td><td>{{$appx}}</td></tr>
                    <tr>
                      <td>Total Rejected</td><td>{{$rej}}</td><td>{{$rejx}}</td></tr>
                      <tr>
                        <td>Total Waiting</td><td>{{$w}}</td><td>{{$wx}}</td></tr>
                        <tr>

                         <td>Total Played</td><td>{{$played}}</td><td>{{$playedx}}</td></tr>
                         <tr>
                          <td>Total Pending</td><td>{{$pend}}</td><td>{{$pendx}}</td></tr>
                          <tr>


                            <td>Males</td><td colspan="2"> {{$m}}  ({{number_format($m/$tt*100,2)}} % )</td></tr>
                            <tr>
                              <td>Females</td><td colspan="2">{{$f}}  ({{number_format($f/$tt*100,2)}} % )</td>

                            </tr></table>

                          </div></div>



                          <div class="col-12">
                            <div class="table-responsive">
                              <table
                              id="customer-table"
                              class="table"
                              style="width: 100%"
                              >
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Team Size</th>  
                                  <th>Nationality</th>
                                  <th>Email ID</th>
                                  <th>Mobile No</th>
                                  <th>Queue</th>
                                  <th>Date & Time</th>
                                  <th>STATUS</th>
                                  <th>score</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php
                                $sno=0;
                                $team_size=0;
                                foreach ($data as $dt){
                                  $sno++;
                                  $style="blue";
                                  if($dt->status=="PENDING"){
                                    $style="blue";
                                  }
                                  else  if($dt->status=="APPROVED"){
                                    $style="green";
                                  }
                                  else  if($dt->status=="REJECTED"){
                                    $style="red";

                                  }
                                  else{
                                    $style="blue";
                                  }
                                  $team_size=$dt->team_size+$team_size;
                                  ?>
                                  <tr>
                                    <td>{{$sno}}</td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{$dt->team_size}}</td>

                                    <td>{{$dt->nationality}}</td>
                                    <td>{{$dt->email}}</td>
                                    <td>{{$dt->mobile_no}}</td>

                                    <td>{{$dt->QueueNo}}</td>
                                    <td>{{date('d-m-Y', strtotime($dt->timestamp))}}</td>
                                    <td style="color:<?php echo $style;?>">{{$dt->status}}</td>
                                    <td>{{$dt->score}}</td>


                                  </tr>
                                  <?php 


                                }?>
<tr><td></td><td></td><td>{{$team_size}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                              </tbody>
                            </table>

                          </div>
                        </div>




                      </div></div>
                      @include('layout.footer') 