 
@include('layout.header') 
@include('layout.menu') 
<!-- Preloader -->
<?php  $value = session()->get('userid');
$allSessions = session()->all();


?>


<div class="container my-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">Registered Customer Details</h1>
        </div>
        <div class="col-12">
          <table
            id="customer-table"
            class="table table-striped"
            style="width: 100%"
          >
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Team Size</th>
               
              
                <th>Nationality</th>
                <th>Email ID<br>Mobile No</th>
              
             
                <th>Queue Number</th>
                <th>Date & Time</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $sno=0;
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
              ?>
              <tr>
                <td>{{$sno}}</td>
                <td>{{$dt->sudo_name}}</td>
                <td>{{$dt->team_size}}</td>
               
                <td>{{$dt->nationality}}</td>
                <td>{{$dt->email}}<br>{{$dt->mobile_no}}</td>
             
                <td>{{$dt->QueueNo}}</td>
                <td>{{date('d-m-Y', strtotime($dt->timestamp));}}</td>
                <td style="color:<?php echo $style;?>">{{$dt->status}}</td>
                <td>
                  
                  <?php if($dt->status=="PENDING"){
                    ?>
<a href="{{url('changestatus/'.$dt->id.'/REJECTED')}}"><button class="btn btn-warning">REJECT</button></a>
<a href="{{url('changestatus/'.$dt->id.'/APPROVED')}}"><button class="btn btn-success">APPROVE</button></a>
                    <?php
                  }
else if($dt->status=="REJECTED"){

  ?>
<a href="{{url('changestatus/'.$dt->id.'/APPROVED')}}"><button class="btn btn-warning">APPROVE</button></a>
  <?php
}
else if($dt->status=="APPROVED"){

  ?>
<a href="{{url('changestatus/'.$dt->id.'/REJECTED')}}"><button class="btn btn-warning">REJECT</button></a>
  <?php
}
?>

                </td>

              </tr>
<?php }?>

            </tbody>
          </table>
        </div>
      </div>
    </div>






@include('layout.footer') 