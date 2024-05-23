 
@include('layout.header') 
@include('layout.menu') 
<!-- Preloader -->


<div class="container my-5">
  <div class="row">
    <div>
      <h1 class="page-title mb-4">Report : Age Group</h1>
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
       $agegroup='';
$agebar='';
$i=5;
while($i<=40){
  $sno++;
  $st=$i;
  $end=$i+4;
  if($i!=40){
    $agex=DB::table('registered_users');


    $age=$agex->where('Age','>=',$i)->where('Age','<',$end)->count(); 
    $agebar=$st."-".$end." "."(".$age.")";

$age1=DB::table('registered_users')->where('Age','>=',$i)->where('Age','<',$end)->where('rdate','2023-10-07')->count(); 
$age2=DB::table('registered_users')->where('Age','>=',$i)->where('Age','<',$end)->where('rdate','2023-10-08')->count(); 
$age3=DB::table('registered_users')->where('Age','>=',$i)->where('Age','<',$end)->where('rdate','2023-10-09')->count(); 
}
else{

    $age=$agex->where('Age','>=',$i)->count();
   $agebar=$st."+"." "."(".$age.")";
$age1=DB::table('registered_users')->where('Age','>=',$i)->where('rdate','2023-10-07')->count(); 
$age2=DB::table('registered_users')->where('Age','>=',$i)->where('rdate','2023-10-08')->count(); 
$age3=DB::table('registered_users')->where('Age','>=',$i)->where('rdate','2023-10-09')->count(); 
}



$agegroup=$age;
$c=$c+$agegroup;
$c1=$c1+$age1;
$c2=$c2+$age2;
$c3=$c3+$age3;




              
                                  ?>
                                  <tr>
                                    <td>{{$sno}}</td>
                                    <td>{{$agebar}}</td>
                                    <td align="right">{{$agegroup}}</td>

                                  <td align="right">{{$age1}}</td>  
                                  <td align="right">{{$age2}}</td>  
                                  <td align="right">{{$age3}}</td>


                                  </tr>
                                  <?php 
$i=$i+5;


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