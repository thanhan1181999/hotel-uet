<nav style="display: flex;">
    <a href="">
        <div class="logo">
            <h4>IslaGrande</h4>
        </div>
    </a>
    <ul class="nav-links">
        <li><a href="home">Home</a></li>
        <li><a href="about">About</a></li>
        <li><a href="blog">Blog</a></li>
        <li><a href="room">Room</a></li>
        {{-- <li><a href="user/booking_form">Booking</a></li> --}}
        @php $login=session()->has('account'); @endphp
        @if($login)
        @php $account=session()->get('account'); @endphp
         <li class="li-user">
            <a href="">{{ $account->name }}</a>
            <ul class="ul-user">
              @if($account->role==0){{-- 1 là customer --}}
                <li><a href="admin/quanly">Quan ly</a></li>
                <li><a href="profile">Profile user</a></li>
                <li><a href="logout">Logout</a></li>
              @else
                <li><a href="profile">Profile user</a></li>
                <li><a href="account/phong_da_book">Phòng đã book</a></li>
                <li><a href="logout">Logout</a></li>
              @endif
            </ul>
        </li>
        @else
        <li onMouseOver="this.style.color='blue'" onMouseOut="this.style.color='white'" style="
        color:white;font-weight: bold;cursor: pointer;font-size: 16.7px;" data-toggle="modal" data-target="#login">Log in</li>
        @endif
    </ul>
    <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
</nav>
<!-- The Modal -->
@if(!$login)
<div class="modal" id="login">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
{{--         <div class="alert alert-danger">Bạn phải đăng nhập để book phòng</div> --}}
        <!-- <a href="redirect/facebook"><button type="button" class="btn btn-block btn-primary">Login with Facebook</button></a> -->
        <a href="redirect/google"><button type="button" class="btn btn-block btn-danger">Login with Google</button></a>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button style="background-color: orange;" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endif