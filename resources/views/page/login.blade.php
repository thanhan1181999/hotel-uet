@extends('loginBase')
@section('content')
<div class="box">
        <div class="box-in-box">
                @if(isset($alert))
                    <h3 style="position:absolute; top:70px;">{{$alert}}</h3>
                @endif
            <!-- đăng nhập -->
            <form action="{{route('dangnhap')}}" id="formlogin" method="post">
                {{csrf_field()}}
                <h2>Login</h2>
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                        {{$err}}
                        @endforeach
                    </div>
                @endif
                @if(Session::has('thanhcong'))
                    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                @endif
                <div class="inputBox">
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required>
                    <label for="">Pasword</label>
                </div>
                <button type="submit">Login</button>
                <a class="btn btn-block" id="forgetpass" onclick="changeForgetPass()" >Forget your accout</a>
                <div>
                    <span>Don't have account? </span>
                    <a href="register">Sign Up</a>
                </div>
                <div>
                    <a href="{{URL::to('auth/google')}}">
                        <i class="fa fa-google"></i>
                        Đăng nhập bằng Google
                    </a>
                </div>
            </form>

            <!-- quên mật khẩu -->
            <form action="{{route('setpassword')}}" id="formforgetpass" hidden="" method="post">
                {{csrf_field()}}
                <h2>Forget Password</h2>
                <div class="inputBox">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="name" required>
                    <label for="">Name</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="phone" required>
                    <label for="">Phone</label>
                </div>
                <button type="submit">Get Password</button>
            </form>
        </div>
    </div>

@endsection
