@extends('admin.dashboard')
@section('table-option')
    <form method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Room Type</label>
            <input type="text" class="form-control" name="room_type" id="room_type" placeholder="Example input">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Hình ảnh phòng</label>
            <input type="file" class="form-control" name="image_room" id="image_room" placeholder="Example input">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Giá</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Example input">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Trích dẫn</label>
            <input type="text" class="form-control" name="trich_dan" id="trich_dan" placeholder="Example input">
        </fieldset>
        <button type="confirm" class="btn btn-success">Thêm mới</button>
    </form>
@endsection
