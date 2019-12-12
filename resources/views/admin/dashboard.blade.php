@extends('master')
@section('content')
<div style="background: linear-gradient(to bottom,#9198e5,#FFF);">
<center><h1 style="background-color:#ed2553;border-radius:50px;font-family: 'Baloo Bhai', cursive;box-shadow:5px 5px 9px blue;text-shadow:2px 2px#000;display:inline-block; margin-top: 50px;">ADMIN</h1></center><br>
      <div class="container-fluid" style="margin-top: 50px;">
        <div class="navbar-header">
         {{--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> --}}
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
{{--           <a class="navbar-brand" href="#">Welcome</a> --}}
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php?option=admin_profile">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
     @php
        $path = url('').'/';
    @endphp
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 sidebar" style="border-right-color: red;">
          <ul class="nav nav-sidebar" style="display: block; background-color: #80808029;">
            <li><a href="{{ $path }}admin/quanly/update_password">Update Password</a></li>
            <li><a href="{{ $path }}admin/quanly/feedback">Feedback</a></li>
            <li><a href="{{ $path }}admin/quanly/room">Room</a></li>
            <li><a href="{{ $path }}admin/quanly/room_type">Room Type</a></li>
            <li><a href="{{ $path }}admin/quanly/booking_details">Booking Details</a></li>
            <li><a href="{{ $path }}admin/quanly/blog">Blog</a></li>
            <li><a href="{{ $path }}admin/quanly/slider">Slider</a></li>
      {{-- <li><a href="#">Payment</a></li> --}}
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Setting <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Logo Update</a></li>
                  <li><a href="#">Address Update</a></li>
              </ul>
            </li>
          </div>
          <div class="col-md-9">
            @yield('table-option')
          </div>
        </div>
    </div>
</div>
@endsection
