<!-- Content Wrapper. Contains page content -->
 
 @include('layout.header') 
  @include('layout.menu')
         <?php
$sno=$limit*$page-$limit+1;

  ?>
 
  <?php
$total_open_events=DB::table('events')->where('event_status','ACTIVE')->count();
?>
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Events <span class="count">( {{$total_open_events}} )</span></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{url('/createevent')}}">Add Events</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('layout.top_search') 
        <div class="row">
          <div class="col-12">
            <div class="card">
             @if ($message = Session::get('message'))
                                <div class="alert alert-danger alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
            <?php  Session(['message' => '']);?>
                            @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th> Event Title</th>
                     <th> Event Description</th>
                    <th>Event Status</th>
                    <th colspan="2">Details</th>
                    
                    <th colspan="2"></th>
                    
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $snox=0;
 foreach($data as $dt){
$snox++;
?>
 
                  <tr>
                    <td>{{$snox}}</td>
                    <td><?php echo $dt->event_title;?></td>
                    <td><?php echo $dt->event_description;?></td>               
                    <td><?php echo $dt->event_status;?></td>
                  <td><?php echo $dt->event_date;?><br><?php echo $dt->event_start_time;?>-<?php echo $dt->event_end_time;?></td>
                      <td>
<a  href="{{url('/leaderboard/'.$dt->id)}}">Leaderboard</a>
                      </td>   
                  </tr>
 <?php }?>
                  </tbody>
                  @include('layout.pagination_keyword') 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @include('layout.footer') 