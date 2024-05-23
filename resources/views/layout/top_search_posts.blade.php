<div class="row">

 <div class="col-md-10 offset-md-1">
                         <div class="row">
                           <div class="col-4">
                               <div class="form-group">
                                   <!-- <label>Result Type:</label> -->
                                   <select class="select2 form-control form-control-lg" data-placeholder="Any" style="width: 100%;"  onChange="window.open(this.options[this.selectedIndex].value,'_parent')">
                                    <option>Select</option>
                                    
                                   <option value="{{url($url.'/'.$id.'/0/10?keyword='.$keyword)}}">10</option>
                                         <option value="{{url($url.'/'.$id.'/0/20?keyword='.$keyword)}}">20</option>
                                         <option value="{{url($url.'/'.$id.'/0/30?keyword='.$keyword)}}">30</option>
                                          <option value="{{url($url.'/'.$id.'/0/50?keyword='.$keyword)}}">50</option>
                                           <option value="{{url($url.'/'.$id.'/0/100?keyword='.$keyword)}}">100</option>
                                </select>
                            </div>
                        </div>


        <div class="col-6 offset-md-2">
          <form action="{{url('getAllPostsByUserID/'.$id.'/0/10')}}" method="get" >
           {{ csrf_field() }}
           <div class="input-group input-group-lg"> 
            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="" name="keyword">
            <div class="input-group-append">
              <button type="submit" class="btn btn_success">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
       </div>
    </div>
    <br>