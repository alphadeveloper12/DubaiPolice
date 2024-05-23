


 @include('layout.header') 
  @include('layout.menu') 


<div class="container register-container">
      <div class="row justify-content-center p-3">
        <h3 class="text-center mb-2 fs-4">Update User</h3>
        <div
          class="d-flex justify-content-center align-items-center register-form-wrapper"
        >
          <form method="post" action="{{ url('/updateuser') }}" autocomplete = "OFF" class="row g-3 needs-validation">
              @csrf
           
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="name" name="name"
                value="{{$tu->name}}"
                required
              />        <input
                type="hidden"
                class="form-control"
                id="id" name="id"
                value="{{$tu->id}}"
                required
              />
              <div class="invalid-feedback">Name is required.</div>
            </div>
            <div class="col-md-6">
              <label for="temaName" class="form-label">Team Name</label>
              <input
                type="text"
                class="form-control"
                id="temaName" name="sudo_name"
                value="{{$tu->sudo_name}}"
                required
              />
              <div class="invalid-feedback">Team name is required.</div>
            </div>
            <div class="col-md-6">
              <label for="teamSize" class="form-label">Team Size</label>
              <input
                type="text"
                class="form-control"
                id="temaSize" name="team_size"
                value="{{$tu->team_size}}"
                required
              />

              <div class="invalid-feedback">Team size is required.</div>
            </div>
  <div class="col-md-6">
              <label for="validationCustom04" class="form-label">Nationality</label>
              <select
                class="form-select" name="nationality"
              >
              	<?php foreach($country as $ct){

              		?>
<option value="{{$ct->name}}" <?php if($ct->name==$tu->nationality){ ?>selected<?php }?>>{{$ct->name}}</option>
              		<?php
              	}
              	?>

              </select>

              <div class="invalid-feedback">Please select a valid state.</div>
            </div>

            <div class="col-md-6">
              <label for="gender" class="form-label">Gender</label>

              <div
                class="d-flex justify-content-start align-items-center gap-3"
              >
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    id="validationFormCheck2"
                    name="gender"
                     <?php if ($tu->gender == 'male') echo 'checked="checked"'; ?> value="male"
                  />
                  <label class="form-check-label" for="validationFormCheck2"
                    >Male</label
                  >
                </div>
                <div class="form-check">
                  <input
                    type="radio"
                    class="form-check-input"
                    id="validationFormCheck3"
                    name="gender"
                     <?php if ($tu->gender == 'female') echo 'checked="checked"'; ?> value="female"
                  />
                  <label class="form-check-label" for="validationFormCheck3"
                    >Female</label
                  >
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input
                  type="text"
                  class="form-control"
                  id="email" name="email" 
                  aria-describedby="inputGroupPrepend"
                  required value="{{$tu->email}}"
                />
                <div class="invalid-feedback">Email is required.</div>
              </div>
            </div>

            <div class="col-md-6">
              <label for="mobile" class="form-label">Mobile Number</label>
              <input
                type="text"
                class="form-control"
                id="mobile" name="mobile_no" 
                value="{{$tu->mobile_no}}"
                required
              />

              <div class="invalid-feedback">Mobile number is required.</div>
            </div>

            <div class="col-md-6">
              <label for="age" class="form-label">Age</label>
              <input
                type="text"
                class="form-control"
                id="age" name="age" 
                value="{{$tu->Age}}"
                required
              />

              <div class="invalid-feedback">Age is required.</div>
            </div>

            <div class="col-12">
              <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-primary" type="submit">
                  Submit Form
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

     @include('layout.footer') 