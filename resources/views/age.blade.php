 
@include('layout.header') 
@include('layout.menu') 
<!-- Preloader -->


<div class="container my-5">
  <div class="row">
    <div>
      <h1 class="page-title mb-4">Report : Age</h1>
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
                            
                                  <th>Age</th>
                                  <th align="right">Count</th>
                            <th align="right">07-10-2023</th>
                              <th align="right">08-10-2023</th>
                                <th align="right">09-10-2023</th>
                                </tr>
                              </thead>
                              <tbody>

                                <?php
                                $sno=0;
                                $team_size=0;
                                $c=0;
                                $c1=0;
                                $c2=0;
                                $c3=0;
                                foreach ($datax as $dt){

                                  $count=DB::table('registered_users')->where('Age',$dt->Age)->count();
                                  $sno++;
                                  $count1=DB::table('registered_users')->where('Age',$dt->Age)->where('rdate','2023-10-07')->count();
                                  $count2=DB::table('registered_users')->where('Age',$dt->Age)->where('rdate','2023-10-08')->count();
                                  $count3=DB::table('registered_users')->where('Age',$dt->Age)->where('rdate','2023-10-09')->count();
$c=$c+$count;
                                  $c1=$c1+$count1;
                                  $c2=$c2+$count2;
                                  $c3=$c3+$count3;
                                  ?>
                                  <tr>
                                    <td>{{$sno}}</td>
                                    <td>{{$dt->Age}}</td>
                                    <td align="right">{{$count}}</td>

                                  <td align="right">{{$count1}}</td>  
                                  <td align="right">{{$count2}}</td>  
                                  <td align="right">{{$count3}}</td>


                                  </tr>
                                  <?php 


                                }?>
<tr style="background-color: lightcoral;">
  <td></td>
  <td></td>
  <td align="right">{{$c}}</td>
  <td align="right">{{$c1}}</td>
  <td align="right">{{$c2}}</td>
  <td align="right">{{$c3}}</td>
  
</tr>
                              </tbody>

                            </table>

                          </div>
                        </div>




                      </div></div>
                      @include('layout.footer') 