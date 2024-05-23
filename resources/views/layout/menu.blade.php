
<?php  $ul= url()->current(); 
$er=explode("/",$ul);
//print_r($er);
if($er[2]=="127.0.0.1:8000"){
$url="http://127.0.0.1:8000/";
}
else{
$url="https://admin.ecrimedp.ae/";
}


if($er[3]=="leadership" || $er[3]=="analytics" || $er[3]=="report"){

 $urlx=$url.$er[3];
}
else if($er[3]=="dashboard"){
if($er['4']=="1" || $er['4']==2){
 $urlx=$url.$er[3]."/".$er[4];
}
else{
$urlx=$url.$er[3]."/0";
}
}




else{

 $urlx=$url.$er[3];
}






 ?>

<div class="container-fluid">
      <div class="container text-dark py-2 px-0 d-block position-relative">
        <div class="row gx-0 align-items-center">
          <div class="col-lg-12">
            <div
              class="d-flex justify-content-md-end justify-content-between align-items-center"
            >
              <div class="dropdown d-flex d-md-none">
                <div
                  class="dropdown-toggle user-icon"
                  data-bs-toggle="dropdown"
                >
                  <i class="bi bi-person-circle"></i>
                </div>

                <ul class="dropdown-menu p-2">
                  <li>
                    <a class="dropdown-item" href="{{url('profile')}}">
                      <i class="bi bi-calendar4-event me-2"></i>
                      Events</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{url('createevent')}}"
                      ><i class="bi bi-person-fill me-2"></i> Profile</a
                    >
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{url('logout')}}"
                      ><i class="bi bi-box-arrow-left me-2"></i>Logout</a
                    >
                  </li>
                </ul>
              </div>

              <div class="h-100 d-inline-flex align-items-center me-0 me-md-4">
                <a href="/">
                  <img src="{{asset('assets/brand/logo.png')}}" alt="logo" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->
    <header class="header-area header-sticky">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="main-nav">
              <!-- ***** Menu Start ***** -->
              <ul class="nav float-start">
                <li class="scroll-to-section <?php if($urlx==$url."leaderboard"){?>active <?php }?>">
                  <a href="{{url('leaderboard')}}" >
                    <img
                      src="{{asset('assets/images/nav/leaderboard.png')}}"
                      alt="leaderboard"
                    />
                    Leader Board</a
                  >
                  <div id="active-border"></div>
                </li>
                <li class="scroll-to-section <?php if($urlx==$url."analytics"){?>active <?php }?>">
                  <a href="{{url('analytics')}}" >
                    <img
                      src="{{asset('assets/images/nav/analytics.png')}}"
                      alt="analytics"
                    />
                    Analytics</a
                  >
                  <div id="active-border"></div>
                </li>
                    <li class="scroll-to-section  <?php if($urlx==$url."dashboard/1"){?>active <?php }?>">
                  <a href="{{url('dashboard/1')}}">
                    <img
                      src="{{asset('assets/images/nav/dashboard.png')}}"
                      alt="dashboard"
                    />
                    APPROVED</a
                  >
                  <div id="active-border"></div>
                </li>

 
                <li class="scroll-to-section  <?php if($urlx==$url."dashboard/2"){?>active <?php }?>">
                  <a href="{{url('dashboard/2')}}" >
                    <img
                      src="{{asset('assets/images/nav/dashboard.png')}}"
                      alt="dashboard"
                    />
                    Rejected</a
                  >
                  <div id="active-border"></div>
                </li>
                      <li class="scroll-to-section  <?php if($urlx==$url."dashboard/0"){?>active <?php }?>">
                  <a href="{{url('dashboard/0')}}">
                    <img
                      src="{{asset('assets/images/nav/dashboard.png')}}"
                      alt="dashboard"
                    />
                    Pending</a
                  >
                  <div id="active-border"></div>
                </li>
                  <li class="scroll-to-section  <?php if($urlx==$url."report"){?>active <?php }?>">
                  <a href="{{url('report')}}">
                    <img
                      src="{{asset('assets/images/nav/dashboard.png')}}"
                      alt="dashboard"
                    />
                    Report</a
                  >
                  <div id="active-border"></div>
                </li>

              </ul>
              <ul class="nav d-none d-md-flex">
                <li class="scroll-to-section <?php if($urlx==$url."createevent"){?>active <?php }?> <?php if($urlx==$url."updateevent"){?>active <?php }?>">
                  <a href="{{url('createevent')}}">
                    <img src="{{asset('assets/images/nav/events.png')}}" alt="event" />
                    Events</a
                  >
                  <div id="active-border"></div>
                </li>




                <div class="nav-item dropdown">
                <?php  if(session()->get('role')==1){?>
                  <a
                    href="#"
                    class="nav-link dropdown-toggle text-white"
                    data-bs-toggle="dropdown"
                  >
                    <img src="{{asset('assets/images/nav/admin.png')}}" alt="admin" />
                    Admin
                  </a>
                <?php }?> 
                
                  <div class="dropdown-menu rounded-0 rounded-bottom m-0 p-3">
                    <?php  if(session()->get('role')==1){?> <a href="{{url('profile')}}" class="dropdown-item py-2 mb-3 px-0"
                      ><i class="bi bi-person-fill"></i> Profile</a
                    >
                   <?php } ?>     
                

                  </div>
                
                </div>
        
                <div class="nav-item dropdown">
     
                <li class="scroll-to-section">
                  <a href="{{url('logout')}}"> Log out</a>
                </li>
                </div>

       
              </ul>

              <!-- ***** Menu End ***** -->
            </nav>
          </div>
        </div>
      </div>
    </header>