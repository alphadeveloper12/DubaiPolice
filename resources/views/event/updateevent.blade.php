 
 @include('layout.header') 
  @include('layout.menu') 
  <?php


  ?>
<div class="container mt-5">
      <div class="row">
        <div>
          <h1 class="page-title mb-4">Create Event</h1>
        </div>

        <div class="col-md-12">
          <div
            class="d-flex justify-content-center align-items-center create-form-wrapper"
          >
            <form method="post" action="{{ url('/UpdateEvent') }}" autocomplete = "OFF">
              @csrf

                <input
                    type="hidden"
                    class="form-control input-light"
                    placeholder="Event Title" name="id" value="{{$id}}"
                  />


              <div class="row">
                <div class="col-12 col-md-6">
                  <label for="exampleInputEmail1" class="form-label"
                    >Event Title</label
                  >
                  <input required 
                    type="text"
                    class="form-control input-light"
                    placeholder="Event Title" name="event_title" value="{{$event->event_title}}"
                  />
                </div>
                <div class="col-12 col-md-6">
                  <label for="exampleInputEmail1" class="form-label"
                    >Location</label
                  >
                  <input  required 
                    type="text"
                    class="form-control input-light"
                    placeholder="Location" name="location" value="{{$event->location}}"
                  />
                </div>

                <div class="col-12 col-md-6">
                  <label for="exampleInputEmail1" class="form-label"
                    >Date</label
                  >
                  <input  required  type="date" class="form-control input-light"  name="event_date"  value="{{$event->event_date}}"/>
                </div>
 
                <div class="col-12 col-md-6">
                  <label for="exampleInputEmail1" class="form-label"
                    >Time</label
                  >
                  <input  required type="time" class="form-control input-light"  name="event_start_time" value="{{$event->event_start_time}}" />
                </div>


            <div class="col-12 col-md-6">
                  <label for="exampleInputEmail1" class="form-label"
                    >Duration</label
                  >
                  <div class="row col-md-12">
                   
                  <div class="row "><div class="col-md-8">    <input required  value="{{$event->duration}}" type="number" class="form-control input-light"  name="duration" /></div>
                    <div class="col-md-2"> min </div></div>
</div></div>

                           <div class="col-12 col-md-6">
                  <label class="form-label ">Event Status</label>

                    <select name="event_status" class="form-control input-light"  required >

                  <option value="ACTIVE" <?php if($event->event_status=="ACTIVE"){?> selected<?php }?>>ACTIVE</option>
                  <option value="INACTIVE" <?php if($event->event_status=="PAUSE"){?> selected<?php }?>>PAUSE</option>
                  <option value="ENDED" <?php if($event->event_status=="ENDED"){?> selected<?php }?>>ENDED</option>
                 </select>
                </div>


                <div class="col-12 col-md-6">
                  <label class="form-label">Description</label>
                  <textarea class="form-control input-light" rows="4" cols="50" name="event_description"  required >{{$event->event_description}}</textarea>
                </div>




              </div>

              <div
                class="d-flex justify-content-center align-items-center mt-5"
              >
                <button class="btn w-100 custom-btn text-white py-2" type="submit">
                  Update
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container my-5">
      <div class="row">
        <div class="col-12">
          <table
            id="events-table"
            class="table table-striped nowrap"
            style="width: 100%"
          >
            <thead>
              <tr>
                <th>No</th>
                <th>Event Title</th>
                <th>Location</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Action</th>
                 <th></th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
                                    <?php 
                                    $snox=0;
 foreach($data as $dt){
$snox++;
?>
 
              <tr>
                      <td>{{$snox}}</td>
                    <td><a href="{{url('regusers/'.$dt->id)}}"  class="link"><?php echo $dt->event_title;?></a></td>
                    <td><?php echo $dt->location;?></td>  
                    <td>{{date('d-m-Y', strtotime($dt->event_date));}}</td>  
                     <td>{{$dt->event_start_time}}</td>    
                    <td><?php echo $dt->event_description;?></td>               
                                 <td>
                <a href="{{url('/updateevent/'.$dt->id ) }}"> <button class="custom-btn btn">Update</button></a>
                </td>
                </td><td><a  href="{{url('/leaderboard/'.$dt->id)}}" class="link">Leaderboard</a></td>
                <td><a  href="{{url('/deleteevent/'.$dt->id)}}"><i class="fa fa-trash" aria-hidden="true" style="color:indianred;"></i></a></td>
              </tr>
<?php  }?>
              
            </tbody>
          </table>
          {{ $data->onEachSide(2)->links() }}
        </div>
      </div>
    </div>
   
 @include('layout.footer') 
