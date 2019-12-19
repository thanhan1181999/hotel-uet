@extends('layouts.index')
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            {{-- hàm ajax lấy loại phòng khi click vào button đặt phòng ngay --}}
            $('.book_room').click(function() {
                var id = $(this).attr('id');
                // alert(id);
                // data là thông tin loại phòng
                $.get('ajax/room_type/'+id,function(data) {
                    // alert(data['so_phong']);
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
            $('input[name="check_in_date"]').change(function() {
                $('input[name="check_out_date"]').attr('min',$(this).val());
            });
            $('input[name="check_out_date"]').change(function() {
                $('input[name="check_in_date"]').attr('max',$(this).val());
            });
        });
    </script>
@endsection
@section('content')
<div class="blog-background" style="background-image: url('images/room/bg_room.jpg');">
    <div class="blog">
        <h1>Room</h1>
        <a href="">HOME</a>
        <a href="room">ROOM</a>
    </div>
</div>
<div class="container" style="margin-top: 50px;">
    <div class="row">
         @foreach ( $room_type as $rt)
            <div class="col-md-6" style="margin-bottom: 50px;">
                <div class="blog-background" style="background-image: url('images/room/{{ $rt->id }}/{{ $rt->image_room->first()->name }}'); height: 380px;"></div>
                <div class="title">
                    <h2>{{ $rt->name }}</h2>
                    <p>{{ $rt->title }}</p>
                    <a href="single_room/{{ $rt->id }}">Xem thêm &rarr;</a>
                </div>
                <div class="price container">
                    <div class="row">
                        <div class="col-sm-8" style="text-align: center;"><p>Giá từ<span>{{ $rt->price }} {{ $rt->unitPrice }}/đêm</span></p></div>
                        <div id ="{{ $rt->id }}" class="col-sm-4 book_room" style="text-align: center;"><div class="btn btn-primary" data-toggle="modal" data-target="#booking-form">Đặt phòng ngay</div>
                        </div>
                    </div>
                </div>
            </div>
         @endforeach
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
{{--     <div class="fixpaginate">
         {!!$room_type->links()!!}
    </div> --}}
</div>
@endsection