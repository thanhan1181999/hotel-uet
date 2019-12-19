<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <base href="{{ asset('') }}">{{-- đường dẫn lúc nào cũng ngang hàng với public --}}
    <link rel="stylesheet" href="library/carousel/owl.carousel.css">
    <link rel="stylesheet" href="library/carousel/owl.theme.default.css">
    <link rel="stylesheet" href="library/carousel/animate.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="library/boostrap/bootstrap.min.css">
{{--     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="library/boostrap/bootstrap.css">
    <link rel="stylesheet" href="library/font-awesome/font-awesome.css">
{{--     <link rel="stylesheet" href="library/boostrap/all.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/footer.css">
{{--     <link rel="stylesheet" href="css/login.css"> --}}
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/room.css">
    <link rel="stylesheet" href="css/fix.css">
    {{-- <style type="text/css">
        h2.about{
            color: #111;
            font-family: 'Helvetica Neue', sans-serif;
            font-weight: bold;
            letter-spacing: -1px;
            line-height: 1;
            text-align: center;
        }
        .booking-form {
            position: relative;
            max-width: 642px;
            width: 100%;
            padding: 40px;
            overflow: hidden;
            background-image: url('upload/bgr-bookingform.jpg');
            background-size: cover;
            border-radius: 5px;
            z-index: 20;
            left: 22%;
        }
        input.form-control:hover {
            border: 10px;
            border-color: orange;
            background-color:white;
        }
        .form-control{
            background-color: rgba(255, 255, 255, 0.6);
        }
        @media (max-width: 575px){
            .booking-form{
                left: unset;
            }
        }
    </style> --}}
    @yield('css')

</head>
<body>
	@include('layouts.header')

	@yield('content')    

    @include('layouts.footer')
    <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root" style="position: fixed;"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="103136754520187">
      </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="library/carousel/owl.carousel.js"></script>
    <script src="js/menu.js"></script>
{{--     <script src="js/login.js"></script> --}}
{{--     <script src="library/boostrap/jquery-3.3.1.slim.min.js"></script> --}}
    <script src="library/boostrap/popper.min.js"></script>
{{--     <script src="library/boostrap/bootstrap.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @yield('js')
</body>