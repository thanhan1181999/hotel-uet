
    <!-- navbar -->
    <nav style="display: flex;z-index: 1001;">
        <a href="/index">
            <div class="logo">
                <h4>IslaGrande</h4>
            </div>
        </a>
        <ul class="nav-links">
            <li><a href="{{ $path }}index">Home</a></li>
            <li><a href="{{ $path }}about">About</a></li>
            <li><a href="{{ $path }}blog">Blog</a></li>
            <li><a href="{{ $path }}room">Room</a></li>
            <li><a href="{{ $path }}user/booking_form">Booking</a></li>

            <li class="li-user">
                <a href="{{ $path }}login">admin</a>
                <ul class="ul-user">
                    <li><a href="{{ $path }}admin/quanly">Quan ly</a></li>
                </ul>
            </li>
            <li class="li-user">
                <a href="{{ $path }}login">user</a>
                <ul class="ul-user">
                    <li><a href="{{ $path }}user/profile">Profile user</a></li>
                    <li><a href="{{ $path }}user/phong_da_book">Phong da book</a></li>
                </ul>
            </li>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
  
