@extends('master')
@section('content')
 @php
        $path = url('').'/';
    @endphp
<div class="blog-background" style="background-image: url('/source/image/3.jpg');">
        <div class="blog">
            <h1>Room</h1>
            <a href="/">HOME</a>
            <a href="#">ROOM</a>
        </div>
    </div>
    <div class="container single-room">
        <div class="row">
            <div class="col-sm-10">
                <h1 class="title-room">Phòng {{$single_room['room_type']}}</h1>
                <div class="row" style="padding-bottom: 80px;
                                        border-bottom: 3px solid grey;">
                    <div class="col-sm-6">
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row item ">
                                        <img src="{{$single_room['image_room']}}" alt="" style="width:100%;">
                                    </div>
                                </div>
                                <div class="carousel-item ">
                                    <div class="row item ">
                                        <img src="{{$single_room['image_room']}}" alt="" style="width:100%;">
                                    </div>
                                </div>
                                <div class="carousel-item ">
                                    <div class="row item ">
                                        <img src="{{$single_room['image_room']}}" alt="" style="width:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="slide-img-room col-md-6">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                              <div class="item active">
                                <img src="{{$single_room['image_room']}}" alt="" style="width:100%;">
                              </div>

                              <div class="item">
                                <img src="{{$single_room['image_room']}}" alt="" style="width:100%;">
                              </div>

                              <div class="item">
                                <img src="{{$single_room['image_room']}}" alt="" style="width:100%;">
                              </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div> --}}
                    <div class="content-room col-sm-6">
                        <p>{{$single_room['trich_dan']}}</p>
                        <p>DIỆN TÍCH:{{$single_room['dien_tich']}} mét vuông</p>
                        @php
                            $quyen_loi = explode(';',$single_room['quyen_loi']);
                        @endphp
                        <p>QUYỀN LỢI</p>
                        <ul>
                            @foreach ($quyen_loi as $element)
                                @if ($element!="")
                                    {{-- expr --}}
                                    <li>{{$element}}</li>
                                @endif
                            @endforeach
                        </ul>
                        <div class="price">
                            <p>Giá từ</p><span>${{$single_room['price']}}</span>
                            <a href="/user/booking_form?room_type={{$single_room['room_type']}}"><button type="button" class="btn btn-primary">Đặt phòng ngay</button></a>
                        </div>
                    </div>
                </div>
                <div class="service-room row">
                    <div class="service-room-single col-sm-4">
                        <div class="img-service"><i class="fa fa-tv fa-3x"></i></div>
                        <p class="name-service">TV màn hình phẳng</p>
                    </div>
                    <div class="service-room-single col-sm-4">
                        <div class="img-service"><i class="fa fa-tv fa-3x"></i></div>
                        <p class="name-service">TV màn hình phẳng</p>
                    </div>
                    <div class="service-room-single col-sm-4">
                        <div class="img-service"><i class="fa fa-tv fa-3x"></i></div>
                        <p class="name-service">TV màn hình phẳng</p>
                    </div>
                    <div class="service-room-single col-sm-4">
                        <div class="img-service"><i class="fa fa-shower fa-3x"></i></div>
                        <p class="name-service">TV màn hình phẳng</p>
                    </div>
                    <div class="service-room-single col-sm-4">
                        <div class="img-service"><i class="fa fa-tv fa-3x"></i></div>
                        <p class="name-service">TV màn hình phẳng</p>
                    </div>
                    <div class="service-room-single col-sm-4">
                        <div class="img-service"><i class="fa fa-clock fa-3x "></i></div>
                        <p class="name-service">TV màn hình phẳng</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">


                @foreach ($room_type as $value)
                    <div style="margin-bottom: 73px;"></div>
                    <div class="room-other" style="margin-bottom: 50px;
                                                   text-align: center;">
                        <h4>{{$value['room_type']}}</h4>
                        <img src="{{$value['image_room']}}" width="100%">
                        <p>{{$value['trich_dan']}}</p>
                        <a href="/single_room/{{$value['id_room_type']}}">Xem thêm &rarr;</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
