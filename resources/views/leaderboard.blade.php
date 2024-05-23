<!-- Content Wrapper. Contains page content -->

@include('layout.header') 
@include('layout.menu') 
<style>
 .modal {
  border-radius: 25px;
}
</style>
<meta http-equiv="refresh" content="30">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container my-5">
  <div class="row">
    <!-- <div class="col-md-6" style="height: 500px; overflow: scroll;">
      <div>
        <h1 class="page-title mb-4">Leaderboard</h1>
      </div>
      <div class="col-12">
        <table
        id="leaderboard-table"
        class="table table-striped nowrap"
        style="width: 100%"
        >
        <thead>
          <tr>
            <th>Rank</th>
            <th>Name</th>
            
            <th>Timing</th>
          </tr>
        </thead>
        <tbody>


         <?php 
         $sno=0;
         foreach($data as $dt){

          $sno++;
          $st=0;


          ?>

          <tr>
            <td><?php 
            if($sno=="1"){
              ?>
              <img src="{{asset('assets/images/rank1.png')}}" class="img" alt="User Image" >
              <?php
            }
            else if($sno=="2"){
              ?>
              <img src="{{asset('assets/images/rank2.png')}}" class="img" alt="User Image" >
              <?php
            }
            else if($sno=="3"){

              ?>
              <img src="{{asset('assets/images/rank3.png')}}" class="img" alt="User Image">
              <?php
            }
            else{
              ?>
              {{$sno}}
              <?php
            }
            ?>

          </td>
          <td><?php echo $dt->sudo_name;?></td>           
          <td><?php echo number_format($dt->score,2);?></td>
        </tr>
      <?php }?>

    </tbody>
  </table>
</div>
</div> -->

<div class="col-md-12" id="test">
  <div>
    <div>
    <h1 class="page-title mt-4 mt-md-0 mb-4">Currently Playing</h1>
    @if ($waitingdataIsEmpty)
    <h4 class="page-title mt-4 mt-md-0 mb-4" style="font-size:14px">Click Start Button</h4>
    </div>
    <div class="col-12">
@elseif (!$waitingdata->isEmpty())
    <h4 class="page-title mt-4 mt-md-0 mb-4" style="font-size:14px">ID: EMP{{ $waitingdata[0]->id }}</h4>
    <h4 class="page-title mt-4 mt-md-0 mb-4" style="font-size:14px">Team Name: {{ $waitingdata[0]->sudo_name }}</h4>
    </div>
    <div class="col-12">
    <button class="btn btn-success" onclick="nextuser(<?php echo $waitingdata[0]->id; ?>, <?php echo $wdata[0]->id; ?>)"  type="button">Next</button>
@endif


   
</div>
</div>


<script>
// Get the modal


 function savestart(id){
   
  
   
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });    
  //var form = $("#smallModal{{$sno}}").serialize();

   //var form = $("#smallModal{{$sno}}").serialize();
  

  let css_property1 =
  {
    "color": "green",
    "font-size": "20px"
  }
  let css_property2 =
  {
    "color": "red",
    "font-size": "20px"
  }
  $.ajax({
    type: "get",
    url: '{{url('ajaxsubmitstart')}}/'+id,
    data: id,
    processData:false,
    contentType: false,
    success: function(response){
      
      if(response == 1){
       
       $('#one{{$sno}}').css(css_property1);
       $('#one{{$sno}}').html("Success");
       $('#smallModal{{$sno}}').modal('toggle');
       parent.location.reload();
     }else{
       $('#one{{$sno}}').css(css_property2);
       $('#one{{$sno}}').html("Players Already On Board");
       $('#smallModal{{$sno}}').modal('toggle');
       parent.location.reload();
     }
     
   }
 });

 }

 function nextuser(completeid, nextid) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let css_property1 = {
        "color": "green",
        "font-size": "20px"
    };
    let css_property2 = {
        "color": "red",
        "font-size": "20px"
    };

    $.ajax({
        type: "get",
        url: '{{url('ajaxsubmitcomplete')}}/' + completeid,
        data: {completeid: completeid, nextid: nextid},
        processData: false,
        contentType: false,
        success: function(response) {
            if (response == 1) {
                $('#one{{$sno}}').css(css_property1);
                $('#one{{$sno}}').html("Success");
                $('#smallModal{{$sno}}').modal('toggle');

                // Announce the nextid value using Web Speech API
                if ('speechSynthesis' in window) {
                    var msg = new SpeechSynthesisUtterance();
                    msg.text = 'The next ID is EMP' + nextid;
                    window.speechSynthesis.speak(msg);
                } else {
                    console.log('Speech synthesis not supported.');
                }

                parent.location.reload();
            } else {
                $('#one{{$sno}}').css(css_property2);
                $('#one{{$sno}}').html("Players Already On Board");
                $('#smallModal{{$sno}}').modal('toggle');
                parent.location.reload();
            }
        }
    });
}


</script>



<div >
  <div>
    <h1 class="page-title mt-4 mb-4">Waiting Team</h1>
  </div>
  <div class="col-12" style="height: 400px; overflow: scroll;">
    <table
    id="leaderboard-table"
    class="table table-striped nowrap"
    style="width: 100%"
    >
    <thead>
      <tr>
        <th>Sr Number</th>
        <th>Name</th>
        <th>Token Number</th>
        
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $sno=0;
      foreach($wdata as $dt){

        $sno++;
        $st=0;


        ?>

        <tr>
          <td>{{$sno}}</td>
          <td><?php echo $dt->sudo_name;?></td>  
          <td>EMP<?php echo $dt->id;?></td>  
          
          <td>Waiting</td>
          <td><button class="btn btn-success" onclick="savestart({{$dt->id}})" type="button">START</button>


          </td>

        </tr>
      <?php }?>

    </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://unpkg.com/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js'></script>
<script>
// Get the modal


 function saveend(id){

  clearInterval(timerInterval);
  
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });    
  //var form = $("#smallModal{{$sno}}").serialize();

   //var form = $("#smallModal{{$sno}}").serialize();
  

  let css_property1 =
  {
    "color": "green",
    "font-size": "20px"
  }
  let css_property2 =
  {
    "color": "red",
    "font-size": "20px"
  }

  var time = $("#timerup").val();

  $.ajax({
    type: "get",
    url: '{{url('ajaxsubmitend')}}/'+id+'?time='+time,
    data: id,
    processData:false,
    contentType: false,
    success: function(response){

              //console.log(status);

      var status= response['status'];
      
      if(status == "success"){
       


        if(response['rank']=="1"){

//$("#rank1").addClass("modal-open");

          $("#rank1").modal('show');
        }
        else if(response['rank']=="2"){
//$("#rank2").addClass("modal-open");
          $("#rank2").modal('show');
        }

        else{
//$("#norank").addClass("modal-open");

          $("#zerorank").modal('show');

        }
        
        
                /*   $('#one{{$sno}}').css(css_property1);
                   $('#one{{$sno}}').html("Success");
                   $('#smallModal{{$sno}}').modal('toggle');
                   parent.location.reload();*/
      }else{
       
       $('#one{{$sno}}').css(css_property2);
       $('#one{{$sno}}').html("Players Already On Board");
       $('#smallModal{{$sno}}').modal('toggle');
       parent.location.reload();
     }
     
   }
 });
}




</script>




@include('layout.footer') 