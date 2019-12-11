@extends('admin.dashboard')
@section('table-option')
    <form action="{{route('edit_room_type')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Room Type</label>
            <input type="text" class="form-control" name="room_type" id="room_type" value="{{$edit_room_type['room_type']}}">
            <input type="hidden" class="form-control" name="id_room_type" id="id_room_type" value="{{$edit_room_type['id_room_type']}}">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Hình ảnh phòng</label>
            <img src="{{$edit_room_type['image_room']}}" alt="" class="fluid">
            <input type="file" class="form-control" name="image_room" id="image_room" placeholder="Example input">
            <input type="hidden" class="form-control" name="old_image_room" id="image_room" value="{{$edit_room_type['image_room']}}">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Giá</label>
            <input type="text" class="form-control" name="price" id="price" value="{{$edit_room_type['price']}}">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Trích dẫn</label>
            <input type="text" class="form-control" name="trich_dan" id="trich_dan" value="{{$edit_room_type['trich_dan']}}">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Diện tích</label>
            <input type="number" class="form-control" name="dien_tich" id="dien_tich" placeholder="Example input">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Quyền lợi</label>
            <textarea class="form-control" name="quyen_loi" cols="50" rows="8" placeholder="ql1;ql2;ql3;..."></textarea>
        </fieldset>
        <button type="confirm" class="btn btn-success">Sửa</button>
    </form>
@endsection
