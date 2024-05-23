<!-- Content Wrapper. Contains page content -->

@include('layout.header') 
@include('layout.menu') 
       <?php
$sno=$limit*$page-$limit+1;
  ?>

<?php

$total_users=DB::table('registered_users')->where('score','')->count();
$total_business_users=DB::table('registered_users')->where('score','>',1)->count();
$total_normal_users=DB::table('registered_users')->count();
?>
<div class="content">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Users <span class="count">( {{$total_users}} )</span></h1>
        </div>
        <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/getAllRegisteredUsers/0/10')}}">Registered Users <span class="count">( {{$total_normal_users}} )</span></a></li>
         
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
           <div class="col-sm-12">


  </div>
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
                <th>Name</th>
                <th>Sudo Name</th>
                <th>Email</th>
                <th>Mobile No</th>
        
                <th>Age</th>
                <th>Registered On</th>
                <th>Status</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              foreach($data as $dt){
      

               $st=0;

               ?>

               <tr>
                <td>{{$sno}}</td>
                <td><?php echo $dt->name;?></td>    
                <td><?php echo $dt->sudo_name;?></td>
                <td><?php echo $dt->email;?></td>
                <td><?php echo $dt->mobile_no;?></td>
             <td><?php echo $dt->Age;?></td>
<td>{{date('d-m-Y', strtotime($dt->rdate));}}</td>
<td>{{$dt->start_time}}-{{$dt->end_time}}</td>
<td>  <a href="#" class="btn btn-lg btn-danger" data-toggle="modal" data-target="#smallModal{{$sno}}">STOP</a>



<!-- small modal -->
<div class="modal fade" id="smallModal{{$sno}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-sm">
  

<form>
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><?php echo $dt->name;?></h4>


        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group">
    <label for="exampleInputEmail1">End Time</label>
    <?php 
$time=explode(" ",$dt->start_time);
    ?>

  <div class="start">  <input type="hidden" name="start_time" id="start_time"  value="{{$time[0]}}" class="start_time">
     <input type="time" name="end_time" id="end_time" class="end_time"   step="3600" min="00:00" max="23:59"    pattern="[0-9]{2}:[0-9]{2}" >
</div>


  </div>


       <div class="form-group">
    <label for="exampleInputEmail1">Score</label>
       <input type="score" name="score">
    
  </div>

       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="btn" onclick="save()">Save changes</button>
      </div>
    </div>
</form>

  </div>
</div>


</td>
           </tr>








         <?php
$sno++;
          }

         ?>
       </tbody>
       @include('layout.pagination_keyword_status')  
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
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://unpkg.com/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>

<script type="text/javascript" language="javascript">  
  
$(document).on('blur','#end_time',function(){
  alert("ok");
  var start_time=$(this).parents('.start').find('#start_time').val();
//var start_time= $(this).find('[id*="start_time"]').val();
     // var start_time = $(".start_time").val();  
         alert(start_time); 
      var end_time = $(this).val();  
      alert(end_time);
    // var diff =  Math.abs(new Date(end_time) - new (start_time));
   //  alert(diff);
   });



</script>


@include('layout.footer') 