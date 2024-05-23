
@include('layout.header') 
@include('layout.menu') 
 <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<div class="container mt-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">Create Admin User</h1>
        </div>
    <?php 

 if (!empty(Session::get('errors')))

{
$message = Session::get('errors');
  ?>
            <div class="alert alert-danger alert-block">
           
                <strong>{{ $message[0] }}</strong>
            </div>
       <?php 
session()->forget('errors');

   }?>
        <div class="col-md-12">
          <div
            class="d-flex justify-content-start align-items-center profile-form-wrapper"
          >
            <form action="{{url('createuser')}}" method="post">
            	  @csrf
              <div class="row">
                <div class="col-12">
                  <label for="exampleInputEmail1" class="form-label"
                    >Username</label
                  >
                  <input
                    type="text"
                    class="form-control input-light" name="username"
                    placeholder="Username"
                  />
                </div>
                <div class="col-12">
                  <label for="exampleInputEmail1" class="form-label" name="password"
                    >Password</label
                  >
                  <input
                    type="password"
                    class="form-control input-light"
                    placeholder="Password"
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

    <div class="container my-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">User Login</h1>
        </div>
        <div id="onex"></div>
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
          

                <td id="onex{{$dt->id}}">
                  <button class="custom-btn btn" id="reset" type="button" onclick="reset('{{$dt->email}}','{{$dt->id}}')">Reset Password</button>
                 
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

<script>
// Get the modal

 function reset(id,idx){
      
 
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});    
    alert(id);

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
            url: '{{ url('forget-password') }}?email='+id,
            data: {'email': id},
            processData:false,
            contentType: false,
            dataType: "json",
            success: function(response){
                if(response == 1){
                  $('#onex'+idx).css(css_property2);
                   $('#onex'+idx).html("Email Sent");
                  
                


                }else{
               
                    $('#onex'+id).html("failed");
      
                }
            
            }
        });
    }

</script>

 @include('layout.footer') 
