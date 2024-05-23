 
@include('layout.header') 
@include('layout.menu') 
<!-- Preloader -->
<?php  $value = session()->get('userid');
$allSessions = session()->all();

$sno=25*($page-1)+1;
?>


<div class="container my-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">Registered Customer Details</h1>
        </div>


        <div class="bg-white p-2 rounded col-6">
 <form method="get" action="{{ url('/dashboard/'.$id) }}" autocomplete = "OFF">
              @csrf
    <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
            <div class="input-group">
              <input type="search" placeholder="Search By Name or Sudo Name" aria-describedby="button-addon1" class="form-control border-0 bg-light  " name="keyword">


              <select name="event" class="form-control border-0 bg-light  ">
                 <option>Select Event</option>
                <?php foreach ($data_event as $eve){

                  ?>

<option value="{{$eve->id}}" <?php if($eve->id=="$event") { ?>selected<?php }?>>{{$eve->event_title}}</option>
                  <?php
                }
                ?>

</option>
              </select>


              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link text-success"><i class="fa fa-search"></i></button>
              </div>
            
            </div>
          </div>
</form>
</div>


        <div class="col-12">
          <div class="table-responsive">
          <table
            id="customer-table"
            class="table table-striped"
            style="width: 100%"
          >
            <thead>
              <tr>
                <th>#</th>
                <th>Team Name</th>
                <th>Team Size</th>  
                <th>Nationality</th>
                <th>Email ID</th>
                <th>Mobile No</th>
                <th>Queue</th>
                <th>Date & Time</th>
                <th>STATUS</th>
                <th>ACTION</th>
                  <th>ACTION</th>
              </tr>
            </thead>
            <tbody>

              <?php
          
foreach ($data as $dt){
  
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
              ?>
              <tr>
                <td>{{$sno}}</td>
                <td>{{$dt->sudo_name}}</td>
                <td>{{$dt->team_size}}</td>
               
                <td>{{$dt->nationality}}</td>
                <td>{{$dt->email}}</td>
                <td>{{$dt->mobile_no}}</td>
             
                <td>{{$dt->QueueNo}}</td>
                <td>{{date('d-m-Y', strtotime($dt->timestamp));}}</td>
                <td style="color:<?php echo $style;?>">{{$dt->status}}</td>
                <td>
                  
                  <?php if($dt->status=="PENDING"){
                    ?>
<a href="{{url('changestatus/'.$dt->id.'/REJECTED/'.$event)}}"><button class="btn btn-warning">REJECT</button></a>
<a href="{{url('changestatus/'.$dt->id.'/APPROVED/'.$event)}}"><button class="btn btn-success">APPROVE</button></a>
                    <?php
                  }
else if($dt->status=="REJECTED"){

  ?>
<a href="{{url('changestatus/'.$dt->id.'/APPROVED/'.$event)}}"><button class="btn btn-warning">APPROVE</button></a>
  <?php
}
else if($dt->status=="APPROVED"){

  ?>
<a href="{{url('changestatus/'.$dt->id.'/REJECTED/'.$event)}}"><button class="btn btn-warning">REJECT</button></a>
  <?php
}
?>

                </td>
                <td><a href="{{url('edituser/'.$dt->id)}}"><i class="fas fa-edit"></i></a></td>

              </tr>
<?php 

$sno++;
}?>

            </tbody>
          </table>
          {{ $data->onEachSide(2)->links() }}
        </div>
        </div>
      </div>
    </div>






@include('layout.footer') 