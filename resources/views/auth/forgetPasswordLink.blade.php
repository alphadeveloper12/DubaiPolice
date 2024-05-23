 @include('layout.header') 
    <div class="container-fluid">
      <div class="container text-dark py-2 px-0 d-block position-relative">
        <div class="row gx-0 align-items-center">
          <div class="col-lg-12 text-end">
            <div class="h-100 d-inline-flex align-items-center me-4">
              <a href="/">
                <img src="{{asset('assets/brand/logo.png')}}" alt="logo" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container login-container">
      <div class="row">
        <h3 class="text-center mb-2 fs-4">Admin Password Reset</h3>
        <div
          class="d-flex justify-content-center align-items-center login-form-wrapper"
        >
         <?php $email=DB::table('password_resets')->where('token',$token)->value('email');?>
                                  
           <form action="{{ url('reset-password') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
  
                       <div class="mb-3">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                           
                                  <input type="text" id="email_address" class="form-control" name="email" required  value="{{$email}}">
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                            
                          </div>
  
                          <div class="mb-3">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              
                          </div>
  
                         <div class="mb-3">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                             
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                            
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Reset Password
                              </button>
                          </div>
                      </form>
        </div>
      </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-lg-square rounded-circle back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>