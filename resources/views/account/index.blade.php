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
    <link rel="stylesheet" href="library/boostrap/bootstrap.css">
    <link rel="stylesheet" href="library/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/fix.css">
    <link rel="stylesheet" href="css/index.css">
    <style type="text/css">
      table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }
    </style>
    @yield('css')

</head>
<body>
	@include('layouts.header')

    <div class="container-fluid"id="primary" 
      style="background: linear-gradient(to bottom,#9198e5,#FFF);"><!--Primary Id-->
      <center><h1 style="background-color:#ed2553;border-radius:50px;
                        font-family: 'Baloo Bhai', cursive;
                        box-shadow:5px 5px 9px blue;
                        text-shadow:2px 2px#000;
                        display:inline-block;
                        margin-top:8vh">
                        @yield('title')</h1>
      </center>
      <br>
      <div class="container">
        @yield('option')
     </div>
    </div>
{{--     hiển thị notice --}}
    <button data-toggle="modal" data-target="#notice" style="display: none;" class="button-notice"></button>
    <!-- Modal -->
    @php  $notice=session()->pull('notice');
          $levelNotice=session()->pull('levelNotice');
    @endphp
    @if($notice!="")
    <div class="modal fade" id="notice" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content--> {{-- booking-form --}}
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          @if($levelNotice=='normal')
            <div class="alert alert-info">{{ $notice }}</div>
          @else
            <div class="alert alert-danger">{{ $notice }}</div>
          @endif
        </div>
    </div>
    @endif
    <script type="text/javascript">
      setTimeout(function() {
          document.getElementsByClassName("button-notice")[0].click();
      },500);
    </script>
{{--     hết phần hiển thị thông báo --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="library/carousel/owl.carousel.js"></script>
    <script src="js/menu.js"></script>
    <script src="library/boostrap/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    @yield('js')
</body>