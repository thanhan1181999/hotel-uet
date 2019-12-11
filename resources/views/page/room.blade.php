
@extends('master')
@section('content')
<div class="blog-background" style="background-image: url('/source/image/bg_3.jpg');">
        <div class="blog">
            <h1>Room</h1>
            <a href="#">HOME</a>
            <a href="#">ROOM</a>
        </div>
    </div>
<div class="container" style="margin-top: 50px;">
            <div class="row">
                 @foreach ( $room_type as $element)
                    <div class="col-md-6" style="margin-bottom: 50px;">
                        <div class="blog-background" style="background-image: url('{{$element['image_room']}}'); height: 380px;"></div>
                        <div class="title">
                            <h2>{{$element['room_type']}}</h2>
                            <p>{{$element['trich_dan']}}</p>
                            <a href="single_room/{{$element['id_room_type']}}">Xem thêm &rarr;</a>
                        </div>
                        <div class="price">
                            <p>Giá từ</p><span>${{$element['price']}}/đêm</span>
                           <a href="booking_form" class="btn btn-primary" style="float: right;">Đặt phòng ngay</a>
                        </div>
                    </div>
                 @endforeach
            </div>
            <div class="row" style="height: 77px;text-align: center;">
                <div class="col-md-6 push-md-3">
                     {!!$room_type->links()!!}
                </div>

            </div>
        </div>
@endsection
