@extends('admin.dashboard')
@section('table-option')
    <form method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Số phòng</label>
            <input type="text" class="form-control" name="room_no" id="room_no" placeholder="Example input">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2"></label>
            <select class="form-control" name="id_room_type">
                <option selected value hidden>Thể loại phòng</option>
                @foreach ($room_type as $value)
                    <option value={{$value['id_room_type']}}>{{$value['room_type']}}</option>
                @endforeach
            </select>
        </fieldset>
        <button type="confirm" class="btn btn-success">Thêm mới</button>
    </form>
@endsection
