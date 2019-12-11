<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @php
        $path = url('').'/';
    @endphp
    <link rel="stylesheet" href="{{ $path }}library/carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ $path }}library/carousel/owl.theme.default.css">
    <link rel="stylesheet" href="{{ $path }}library/carousel/animate.css">
    <link rel="stylesheet" href="{{ $path }}css/menu.css">
    <link rel="stylesheet" href="{{ $path }}library/boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $path }}library/boostrap/bootstrap.css">
    <link rel="stylesheet" href="{{ $path }}library/boostrap/font-awesome.css">
    <link rel="stylesheet" href="{{ $path }}library/boostrap/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ $path }}css/footer.css">
    <link rel="stylesheet" href="{{ $path }}css/login.css">
    <link rel="stylesheet" href="{{ $path }}css/index.css">
    <link rel="stylesheet" href="{{ $path }}css/blog.css">
    <link rel="stylesheet" href="{{ $path }}css/room.css">

    <style type="text/css">
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
            background-image: url('{{ $path }}upload/bgr-bookingform.jpg');
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
    </style>
</head>
<body>


    @include('header')
    <div class="rev-slider">
    @yield('content')
    </div> <!-- .container -->
     @include('footer')
    <script src="{{ $path }}library/jquery-3.4.1.js"></script>
    <script src="{{ $path }}library/carousel/owl.carousel.js"></script>
    <script src="{{ $path }}js/menu.js"></script>
    <script src="{{ $path }}js/login.js"></script>
    <script src="{{ $path }}library/boostrap/jquery-3.3.1.slim.min.js"></script>
    <script src="{{ $path }}library/boostrap/popper.min.js"></script>
    {{-- <script src="{{ $path }}library/boostrap/bootstrap.min.js"></script> --}}
    <script src="{{ $path }}library/boostrap/bootstrap.js"></script>
</body>
</html>
