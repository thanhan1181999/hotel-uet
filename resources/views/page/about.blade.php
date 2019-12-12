@extends('master')
@section('content')
<div class="blog-background" style=" background-image: url('source/image/bg_3.jpg');">
        <div class="blog">
            <h1>About</h1>
            <a href="#">HOME</a>
            <a href="#">ABOUT</a>
        </div>
    </div>

    <!-- nội dung chính bao gồm cả header và footer-->
    <div class="container">
        <!-- lịch sử khách sạn -->
        <div class="container" style="padding-top: 107px; padding-bottom: 104px;">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="about">Thousand-star Hotel / 10 years of excellence</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <p>
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum, a bibendum lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse nec faucibus velit. Quisque eleifend orci ipsum, a bibendum lacus suscipit sit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse nec faucibus velit.
                        </p>
                    </div>
                    <div>
                        <img src="upload/sig.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-fluid" style="justify-content: space-between; display: flex; align-items: flex-start;"> <!-- không hiểu lắm -->
                        <img src="upload/logo1.png" alt="">
                        <img src="upload/logo2.png" alt="">
                        <img src="upload/logo3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- dịch vụ của khách sạn -->
        <div class="conntainer" style="padding-bottom: 104px;">
            <div class="row">
                <div class="col-lg-6">
                    <div style="background-image: url('upload/gallery_3.jpg'); height: 690px; width: 100%; "></div>
                </div>
                <div class="col-lg-6">
                    <div style="    padding-top: 150px; padding-bottom: 77px;text-align: center;" >
                        <h2 class="about">Thousand-star Service</h2>
                        <p style="font-size: 20px">
                            Other services offered to guests of the hotel, can be considered as bonuses. These are the laundry service, massage room, fitness gyms, conference rooms, lock boxes for valuable assets and many other things. These services can be included in the price of the room or paid separately.
                        </p>
                        <!-- thống kê những dịch vụ -->
                        <div style=" align-items: flex-start; display: flex;">
                            <div style="width: 33.33%">
                                <div style="font-size: 50px">45</div>
                                <div style="font-size: 20px">Room</div>
                            </div>
                            <div style="width: 33.33%">
                                <div style="font-size: 50px">2</div>
                                <div style="font-size: 20px">Swimming pools</div>
                            </div>
                            <div style="width: 33.33%">
                                <div style="font-size: 50px">2</div>
                                <div style="font-size: 20px">Gyms Pratise Room</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
