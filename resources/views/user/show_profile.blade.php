@extends('user.profileuser')
@section('option')
<div class="row" style="display: block;margin-top:8vh">
     <form action="edit_profile_user" class="form-group" method="post" enctype="multipart/form-data">
      @csrf
       <div class="col-sm-6">
          <div class="form-group">
           <div class="row">
              <div class="control-label col-sm-4"><h4> Name :</h4>
              </div>
              <div class="col-sm-8">
               <input type="text" name="name" value="{{$account['name']}}"class="form-control"/>
               <input type="hidden" name="id_ac" value="{{$account['id_ac']}}"class="form-control"/>
              </div>
            </div>
          </div>

        <div class="form-group">
             <div class="row">
                <div class="control-label col-sm-4"><h4>Email</h4></div>
                  <div class="col-sm-8">
                   <input type="text" name="email" value="{{$account['email']}}"class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
             <div class="row">
                <div class="control-label col-sm-4"><h4>Password:</h4></div>
                  <div class="col-sm-8">
                   <input type="password" name="password" value="{{$account['password']}}"class="form-control"/>
            </div>
          </div>
        </div>
        <div class="form-group">
             <div class="row">
                <div class="control-label col-sm-4"><h4>Phone:</h4></div>
                  <div class="col-sm-8">
                   <input type="text" name="phone" value="{{$account['phone']}}"class="form-control"/>
            </div>
          </div>
        </div>
        <div class="form-group">
             <div class="row">
                <div class="control-label col-sm-4"><h4>Address:</h4></div>
                  <div class="col-sm-8">
                   <input type="text" name="address" value="{{$account['address']}}"class="form-control"/>
            </div>
          </div>
        </div>
        <div class="form-group">
             <div class="row">
                <div class="control-label col-sm-4"><h4>Gender:</h4></div>
                  <div class="col-sm-8" style="display: flex;">
                      <div class="radio">
                          <label>
                              <input type="radio" name="gender" id="exampleRadios1" value="nam" @php
                                if($account['gender']=='nam')
                                  echo 'checked';
                              @endphp>
                              Nam
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="gender" id="exampleRadios1" value="nu" @php
                                if($account['gender']=='nam')
                                  echo 'checked';
                              @endphp>
                              Nu
                          </label>
                      </div>
                      <div class="radio">
                          <label>
                              <input type="radio" name="gender" id="exampleRadios1" value="khac" @php
                                if($account['gender']=='nam')
                                  echo 'checked';
                              @endphp>
                              Khac
                          </label>
                      </div>
               </div>
          </div>
        </div>
      </div>
      <img src="{{$account['avatar']}}" alt="" style="height:100px;width:100px;border-radius:50%;margin-left: 50%;
    transform: translatex(-50%);">
       <div class="col-sm-6">
             <div class="form-group">
                <span style="position: absolute;padding-left: 20px; color: orange;">Avatar Profile</span>
               
                <input type="file" class="form-control" name="avatar" id="avatar" style="height: 60px; padding-top: 30px; padding-left: 20px;border-radius: 30px;">
                <input type="hidden" value="{{$account['avatar']}}" name="old_avatar">
              </div>
       </div>
      <div class="form-group">
       <div class="row">
          <div class="control-label col-sm-5">
          </div>
          <div class="col-sm-7  ">
           <input type="submit" value="Update Profile" name="update" class="btn btn-primary"/>
          </div>
        </div>
      </div>
  <!--User Profile Update Query-->
      </form>
    </div>
@endsection
