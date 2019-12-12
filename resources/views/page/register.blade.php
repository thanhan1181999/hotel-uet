@extends('master')
@section('content')
<div style="background-image: url('source/image/bg-login.jpg');
                background-size: cover;"  >
    <div class="container">
        <div class="row" >
            <div class="col-sm-6 push-sm-3" style="background-color: white; margin-bottom: 100px; margin-top: 100px; border-radius: 30px;">
                <div class="formheader text-xs-center" style="color: black;">
                    <h1>Register</h1>
                </div>
                <form class="form-group" method="POST" enctype="multipart/form-data" style="padding: 30px;">
                    @csrf
                        <div class="form-group">
                            <span style="position: absolute;padding-left: 20px; color: orange;">Name</span>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Jane Doe" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2" style="position: absolute;padding-left: 20px; color: orange;">Telephone</label>
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="0123456789" style="height: 60px; padding-top: 20px;padding-left: 20px; border-radius: 30px;">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail2" style="position: absolute;padding-left: 20px; color: orange;">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="abcxyx@gmail.com" style="height: 60px; padding-top: 20px;padding-left: 20px; border-radius: 30px;">
                                </div>
                            </div>
                             <div class="col-sm-6">
                                    <div class="form-group">
                                        <span style="position: absolute;padding-left: 20px; color: orange;">Address</span>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="City,Street" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span style="position: absolute;padding-left: 20px; color: orange;">Password</span>
                            <input type="Password" class="form-control" name="password" id="password" placeholder="****" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                        </div>
                        <div class="form-group">
                            <span style="position: absolute;padding-left: 20px; color: orange;">RePassword</span>
                            <input type="Password" class="form-control" name="re_password" id="re_password" placeholder="****" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                        </div>

                        <div class="row" style="height: 60px;">
                            <div class="col-sm-3" style="padding-top: 10px;">
                                <label style="color: orange; padding-left: 20px">Gender</label>
                            </div>
                            <div class="col-sm-9" style="justify-content: space-between; display: flex; align-items: flex-start; padding-top: 10px;">

                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="exampleRadios1" value="nam" checked>
                                        Nam
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="exampleRadios1" value="nữ">
                                        Nữ
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="exampleRadios1" value="khác" >
                                        Khác
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span style="position: absolute;padding-left: 20px; color: orange;">Avatar Profile</span>
                            <input type="file" class="form-control" name="avatar" id="avatar" style="height: 60px; padding-top: 30px; padding-left: 20px;border-radius: 30px;">
                        </div>
                    <button type="submit" class="form-control btn btn-warning" style="color: black;">Đăng kí</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

