 @include('layout.header') 
    <div class="container-fluid">
      <div class="container text-dark py-2 px-0 d-block position-relative">
        <div class="row gx-0 align-items-center">
          <div class="col-lg-12 text-end">
            <div class="h-100 d-inline-flex align-items-center me-4">
              <a href="/">
                <img src="./assets/brand/logo.png" alt="logo" />
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container login-container">
      <div class="row">
        <h3 class="text-center mb-2 fs-4">Admin Login</h3>
        <div
          class="d-flex justify-content-center align-items-center login-form-wrapper"
        >
          <form method="post" action="{{ url('/checklogin') }}" autocomplete = "OFF">
              @csrf
                                  
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">EmailID</label>
              <input
                type="email"
                class="form-control input-light"
                placeholder="enter your name" name="email" id="email"
              />
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label" 
                >Password</label
              >
              <input
                type="password"
                class="form-control input-light"
                placeholder="password" name="password" id="password"
              />
            </div>

                       @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif



            <div class="d-flex justify-content-center align-items-center">
              <button type="submit" class="btn w-100 custom-btn text-white py-2">
                Login
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