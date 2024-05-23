

@include('layout.header') 
@include('layout.menu') 


<div class="container">
      <div class="row">
        <h1 class="page-title pt-4 pb-2">Analytics</h1>



<div class="container my-5">
      <div class="row">
        <div class="col-12">
          <table
            id="events-table"
            class="table table-striped nowrap"
            style="width: 100%"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>Event Title</th>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Action</th>
                 <th></th>
                    <th></th>
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
                    <td><a href="{{url('regusers/'.$dt->id)}}"  class="link"><?php echo $dt->event_title;?></a></td>
                    <td><?php echo $dt->location;?></td>  
                    <td>{{date('d-m-Y', strtotime($dt->event_date));}}</td>  
                     <td>{{$dt->event_start_time}}</td>    
                    <td><?php echo $dt->event_description;?></td>               
                                 <td>
                 <a href="{{url('/updateevent/'.$dt->id ) }}" > <button class="custom-btn btn">Update</button></a>
                </td><td><a  href="{{url('/leaderboard/'.$dt->id)}}" class="link">Leaderboard</a></td>
              </td><td><a  href="{{url('/deleteevent/'.$dt->id)}}"><i class="fa fa-trash" aria-hidden="true" style="color:indianred;"></i></a></td>
              </tr>
<?php  }?>
              
            </tbody>

          </table>
          <div><a href="{{url('createevent')}}" class="link">View All</a></div>
        </div>
      </div>
    </div>



      <h2 class="fs-6 py-2"><a href="{{ url('/analytics') }}">Show All</a></h2>

        <div id="reportrange">
          <form method="get" action="{{ url('/analytics') }}" autocomplete = "OFF">
      @csrf
      <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
        <div class="input-group">
          <input type="date" placeholder="select date" aria-describedby="button-addon1" class="form-control border-0 bg-light  " name="event_date" required value="{{$event_date}}">
           <div class="input-group-append">
      <button id="button-addon1" type="submit" class="btn btn-link text-success"><i class="fa fa-search"></i></button>
    </div>
</div></div>





        </div>

        <div class="my-4 border-box p-4 players-chart-wrapper">
          <p class="table-title">Number of Players</p>
          <canvas id="playersChart"></canvas>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="my-4 p-4">
            <p class="table-title">Players Gender</p>
            <canvas id="playersGender"></canvas>
          </div>
        </div>

        <div class="col-md-8">
          <div class="my-4 border-box p-4">
            <p class="table-title">Players Age Group</p>
            <canvas id="playersAge"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="my-4 border-box p-4 nationality-chart-wrapper">
          <p class="table-title">Nationality</p>
          <canvas id="nationality"></canvas>
        </div>
      </div>
    </div>

    <script
      type="text/javascript"
      src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"
    ></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php

$datec=[];
$us=[];

$allusersx=DB::table('registered_users');

if($event_date!=''){
  $allusersx->where('rdate','like','%'.$event_date.'%');
}

$allusers=$allusersx->orderby('rdate','DESC')->distinct('rdate')->get('rdate');
foreach($allusers as $au){

$cus=DB::table('registered_users')->where('rdate',$au->rdate)->count();

$us[]=$cus;
$datec[]=$au->rdate;

}


 ?>


<?php
$gender=[];
      $malex=DB::table('registered_users');
if($event_date!=''){
  $malex->where('rdate','like','%'.$event_date.'%');
}

      $male=$malex->where('gender','male')->count();
    $femalex=DB::table('registered_users');
if($event_date!=''){
  $femalex->where('rdate','like','%'.$event_date.'%');
}

    $female=$femalex->where('gender','female')->count();
$gender[]=$male;
$gender[]=$female;

    ?>



<?php
$agegroup=[];
$agebar=[];
$i=5;
while($i<=40){
  $st=$i;
  $end=$i+4;
  if($i!=40){
    $agex=DB::table('registered_users');
if($event_date!=''){
  $agex->where('rdate','like','%'.$event_date.'%');
}

    $age=$agex->where('Age','>=',$i)->where('Age','<',$end)->count(); 
    $agebar[]=$st."-".$end." "."(".$age.")";
  }
else{
   $agex=DB::table('registered_users');
if($event_date!=''){
  $agex->where('rdate','like','%'.$event_date.'%');
}

  $age=$agex->where('Age','>=',$i)->count();
   $agebar[]=$st."+"." "."(".$age.")";
}

$agegroup[]=$age;
$i=$i+5;

}
     


    ?>

<?php
$country=[];
$ccount=[];
 $ccx=DB::table('registered_users');
if($event_date!=''){
  $ccx->where('rdate',$event_date);
}


 $cc=$ccx->orderby('nationality','ASC')->distinct('nationality')->get('nationality');
foreach($cc as $na){
 $ccy=DB::table('registered_users');
 if($event_date!=''){
  $ccy->where('rdate',$event_date);
}
$ccz=$ccy->where('nationality',$na->nationality)->count();

$country[]=$na->nationality." "."(".$ccz.")";
$ccount[]=$ccz;
}



     


    ?>



    <script>
      // PlayersChart
      const ctx = document.getElementById("playersChart");

      new Chart(ctx, {
        type: "line",
        data: {
          labels: <?php echo json_encode($datec);?>,
          datasets: [
            {
              label: "Number of Players",
              data: <?php echo json_encode($us);?>,
              fill: false,
              borderColor: "#BA141A",
              tension: 0.1,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: true,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

</script>




<script>
      //   PlayersGender

      const gender_ctx = document.getElementById("playersGender");



      new Chart(gender_ctx, {
        type: "doughnut",
        data: {
          labels: ["Male", "Female"],
          datasets: [
            {
              label: "Gender",
              data: <?php echo json_encode($gender);?>,
             backgroundColor: ["#BA141A", "#FF5353"],
              hoverOffset: 4,
            },
          ],
        },
        options: {
          //   cutout: 100,
          plugins: {
            legend: {
              display: true,
              position: "bottom",
              labels: {
                font: {
                  size: 15,
                  family: "Inter",
                },
              },
            },
          },
          responsive: true,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                },
              },
            ],
          },
        },
      });

      // PlayersAge
      const age_ctx = document.getElementById("playersAge");

      new Chart(age_ctx, {
        type: "bar",
        data: {
          labels: <?php echo json_encode($agebar);?>,
          datasets: [
            {
              label: "Age",
              data: <?php echo json_encode($agegroup);?>,
              backgroundColor: ["#BA141A"],
              borderColor: ["#BA141A"],
              borderWidth: 1,
            },
          ],
        },
        options: {
          barPercentage: 0.3,
          plugins: {
            legend: {
              display: true,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      // Nationality
      const nationality_ctx = document.getElementById("nationality");

      new Chart(nationality_ctx, {
        type: "line",
        data: {
          labels:<?php echo json_encode($country);?>,
          datasets: [
            {
              label: "",
              data: <?php echo json_encode($ccount);?>,
               backgroundColor: ["#BA141A"],
              borderColor: ["#BA141A"],
              borderWidth: 1,
            },
          ],
        },
        options: {
          barPercentage: 0.3,
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            },
          },
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });

      $(function () {
        var start = moment().subtract(29, "days");
        var end = moment();

        function cb(start, end) {
          $("#reportrange span").html(
            start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
          );
        }

        $("#reportrange").daterangepicker(
          {
            startDate: start,
            endDate: end,
            ranges: {
              Today: [moment(), moment()],
              Yesterday: [
                moment().subtract(1, "days"),
                moment().subtract(1, "days"),
              ],
              "Last 7 Days": [moment().subtract(6, "days"), moment()],
              "Last 30 Days": [moment().subtract(29, "days"), moment()],
              "This Month": [
                moment().startOf("month"),
                moment().endOf("month"),
              ],
              "Last Month": [
                moment().subtract(1, "month").startOf("month"),
                moment().subtract(1, "month").endOf("month"),
              ],
            },
          },
          cb
        );

        cb(start, end);
      });
    </script>
