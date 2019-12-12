@extends('loginBase')
@section('content')
<div class="box">
        <div class="box-in-box">
            <!-- quên mật khẩu -->
            <form action="setpassword" id="formforgetpass" method="post" onsubmit="return validate()">
                {{csrf_field()}}
                {{ method_field('PUT') }}
                <h2>Reset Password</h2>
                <div class="inputBox">
                    <input name="email" value={{$email}} required>
                    <label for="">Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required id="password">
                    <label for="">Password</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="repassword" required id="repassword">
                    <label for="">RePassword</label>
                </div>
                <button type="submit">Get Password</button>
            </form>
        </div>
    </div>
    <script type = "text/javascript">
         function validate()  {
             let u = document.getElementById("password").value;
             let p = document.getElementById("repassword").value;

            if (u!=p){
                alert("password not match");
                return false;
            }

            return true;
         }
      </script>

@endsection
