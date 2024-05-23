 
 @include('layout.header') 

 <!-- Preloader -->
  <!-- Content Wrapper. Contains page content -->
  <div class="d-flex justify-content-center" style="width:50%; margin-top: 100px; background-color: red;">
    <!-- Content Header (Page header) -->
    <section class="content-header d-flex justify-content-center">
      <div class="container-fluid">
        <div class="row mb-2">
<!--          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>-->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <img src="{{url('assets/dist/img/dubai-police-org.svg')}}" width=200>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Admin <small>Login</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             <form method="post" action="{{ url('/checklogin') }}" autocomplete = "OFF">
              {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                  </div>
            
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
     
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   