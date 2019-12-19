@extends('layouts.index')
{{-- mã css và js để chạy slide --}}
@section('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
{{-- <link rel="stylesheet" type="text/css" href="css/booking_form.css"> --}}
<style>
    .mySlides {display:none;}
</style>
<link rel="stylesheet" type="text/css" href="css/single_room.css">
<script type="text/javascript">
    //dùng chạy slide room, cái này copy phần nhiều trên w3schools
    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      x[slideIndex-1].style.display = "block";  
    }
    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > x.length) {slideIndex = 1}
      x[slideIndex-1].style.display = "block";
      setTimeout(carousel, 9000); // Change image every 4 seconds
    }
</script>
@section('js')
<script type="text/javascript">
    var slideIndex = 1;
    showDivs(slideIndex);
    carousel();
</script>
<script type="text/javascript">
    $(document).ready(function() {
        {{-- hàm ajax lấy loại phòng khi click vào button đặt phòng ngay --}}
        $('.book_room').click(function() {
            var id = $(this).attr('id');
            // alert(id);
            // data là thông tin loại phòng
            $.get('ajax/room_type/'+id,function(data) {
                // alert(data['title']);
                $('input[name="room_type"]').attr('value',data['name']);
                $('input[name="id_room_type"]').attr('value',data['id']);
                //cho data ra option lựa chọn phòng
                var option_so_phong='';
                for(var i=1;i<=data['so_phong'];i++) {
                    option_so_phong+='<option value="'+i+'">'+i+'</option>';
                }
                $('select[name="so_phong"]').html(option_so_phong);
            });
        });
        // luôn làm cho check_in_date < check_out_date
        $('input[name="check_in_date"]').change(function() {
          $('input[name="check_out_date"]').attr('min',$(this).val());
        });
        $('input[name="check_out_date"]').change(function() {
          $('input[name="check_in_date"]').attr('max',$(this).val());
        });
    });
</script>
@endsection
@endsection
@section('content')
<div class="blog-background" style="background-image: url('images/room/bg_room.jpg');">
    <div class="blog">
        <h1>Room</h1>
        <a href="">HOME</a>
        <a href="room">ROOM</a>
    </div>
</div>
<div class="container single-room">
  <div class="row">
      <div class="col-md-10">
        <h1 class="title-room">Phòng {{ $room_type->name }}</h1>
        <div style="padding-bottom: 80px;">
            <div class="slide-img-room clearfix">
              <div class="w3-content w3-display-container">
                  @foreach($room_type->image_room as $img)
                  <img class="mySlides w3-animate-fading" src="images/room/{{ $room_type->id }}/{{ $img->name }}" style="width:100%">
                  @endforeach
                  <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
              </div>
            </div>
            <div class="content-room" >
                <p>{{ $room_type->description }}</p>
                <p>DIỆN TÍCH: {{ $room_type->area }} {{ $room_type->unitArea }}</p>
                <p>SỐ PHÒNG: {{ $room_type->room->count() }}</p>
                <p>QUYỀN LỢI</p>
                <ul>
                  @foreach($room_type->quyenloi_room as $ql)
                  <i style="margin-left: 20px;" class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;<li style="list-style-type: none;display: inline;">{{ $ql->description }}</li><br/>
                  @endforeach
                </ul>
                <p>DỊCH VỤ CUNG CẤP</p>
                <ul>
                  @foreach($room_type->service_room as $sr)
                  <i style="margin-left: 20px;" class="fa fa-check"></i>&nbsp;&nbsp;&nbsp;<li style="list-style-type: none;display: inline;">{{ $sr->description }}</li><br/>
                  @endforeach
                </ul>
                <div class="price container">
                    <div class="row">
                      <div class="col-sm-7" style="text-align: center;"><p>Giá từ<span>{{ $room_type->price }} {{ $room_type->unitPrice }}/đêm</span></p></div>
                      <div id="{{ $room_type->id }}" class="col-sm-5 book_room" style="text-align: center;"><div style="width: 100%;font-size: 18px;" class="btn btn-primary" data-toggle="modal" data-target="#booking-form">Đặt phòng ngay</div></div>
                      <!-- Modal -->
                      <div class="modal fade" id="booking-form" role="dialog">
                        <div class="modal-dialog">
                        
                          <!-- Modal content--> {{-- booking-form --}}
                          @php $login=session()->has('account'); @endphp
                          <div @if($login) style="background-image: url('images/room/bg-bookingform.jpg');" @endif class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @if($login)
                                  @include('pages.room.booking_form')
                                @else <div class="alert alert-danger">Bạn phải đăng nhập để đặt phòng</div>
                                @endif
                            </div>
                          </div>
                            
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-2">
          @foreach($other_room_type as $rt)
          <div class="room-other" style="margin-bottom: 50px;
                                         text-align: center;
                                         margin-top: 40px;">
              <h4>{{ $rt->name }}</h4>
              <img src="images/room/{{ $rt->id }}/{{ $rt->image_room->first()->name }}" width="100%">
              <p>{{ $rt->title }}.</p>
              <a style="color: blue;" href="single_room/{{ $rt->id }}">Xem thêm &rarr;</a>
          </div>
          @endforeach
      </div>
  </div>
</div>

@endsection