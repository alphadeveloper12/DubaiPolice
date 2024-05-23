 
@include('layout.header') 
@include('layout.menu') 
<!-- Preloader -->


<div class="container my-5">
  <div class="row">
    <div>
      <h1 class="page-title mb-4">Report : Top</h1>
    </div>



<div class="bg-white p-2 rounded col-6">
     <form method="get" action="{{ url('/top3') }}" autocomplete = "OFF">
      @csrf
      <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
        <div class="input-group">
          <input type="date" placeholder="select date" aria-describedby="button-addon1" class="form-control border-0 bg-light  " name="event_date" required value="{{$event_date}}">

   <div class="input-group-append">
      <button id="button-addon1" type="submit" class="btn btn-link text-success"><i class="fa fa-search"></i></button>
    </div>

  </div>
</div>
</form>
</div>



 <div class="row">
   <div class="col-3"><b><a href="{{url('/nationality')}}">Nationality</a></b></div>
   <div class="col-3"><b><a href="{{url('/age')}}">Age</a></b></div>
   <div class="col-3"><b><a href="{{url('/agegroup')}}">Age Group</a></b></div>
   <div class="col-3"><b><a href="{{url('/top3')}}">Top 10</a></b></div>
</div>



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
                                  <th>Sudo Name</th>
                                  <th>Team Size</th>  
                                  <th>Nationality</th>
                                  <th>Email ID</th>
                                  <th>Mobile No</th>
                                  <th>score</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php
                                $sno=0;
                                $team_size=0;
                                foreach ($data as $dt){
                                  $sno++;
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
            ?></td>
                                    <td>{{$dt->name}}</td>
                                    <td>{{$dt->sudo_name}}</td>
                                    <td>{{$dt->team_size}}</td>
                                    <td>{{$dt->nationality}}</td>
                                    <td>{{$dt->email}}</td>
                                    <td>{{$dt->mobile_no}}</td>
                                    <td>{{$dt->score}}</td>
                            


                                  </tr>
                                  <?php 


                                }?>

                              </tbody>
                            </table>

                          </div>
                        </div>




                      </div></div>
                      @include('layout.footer') 