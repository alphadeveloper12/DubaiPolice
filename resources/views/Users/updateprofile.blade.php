
@include('layout.header') 
@include('layout.menu') 

<div class="container mt-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">Admin</h1>
        </div>

        <div class="col-md-12">
          <div
            class="d-flex justify-content-start align-items-center profile-form-wrapper"
          >
            <form action="{{url('updatepassword')}}" method="post">
            	  @csrf
              <div class="row">
                <div class="col-12">
                  <label for="exampleInputEmail1" class="form-label"
                    >Username</label
                  >
                   <input
                    type="hidden"
                    class="form-control input-light" name="id"
                    placeholder="Username" value="{{$dt->id}}"
                  />
               {{$dt->username}}
                </div>
                <div class="col-12">
                  <label for="exampleInputEmail1" class="form-label" name="password"
                    >Password</label
                  >
                  <input
                    type="password"
                    class="form-control input-light"
                    placeholder="Password" value="{{$dt->password}}"
                  />
                </div>
              </div>

              <div
                class="d-flex justify-content-center align-items-center mt-5" >
                <button  type="submit"  class="btn w-100 custom-btn py-2">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@if ($errors->any())
    <div class="alert alert-danger">
        There were some errors with your request.
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container my-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">User Login</h1>
        </div>
        <div class="col-12">
          <table
            id="login-table"
            class="table table-striped nowrap"
            style="width: 100%"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>User Name</th>          
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
            	<?php          $sno=0;
         foreach($data as $dt){
  $sno++;
         	?>
              <tr>
                <td>{{$sno;}}</td>
                <td>{{$dt->username}}</td>
          

            <td>
                  <a href="{{url('resetpassword/'.$dt->id)}}"><button class="custom-btn btn">Reset Password</button></a>
                </td>
                <td>
                   <a href="{{url('deleteuser/'.$dt->id)}}"><button class="custom-btn btn">Delete</button></a>
                </td>
              </tr>
<?php }?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>


 @include('layout.footer') 
