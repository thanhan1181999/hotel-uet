@extends('admin.dashboard')
@section('table-option')
    <form action="{{route('edit_room')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <fieldset class="form-group">
            <label for="formGroupExampleInput">Số phòng</label>
            <input type="text" readonly="readonly" class="form-control" name="room_no" id="room_no" value="{{$edit_room['room_no']}}">
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2"></label>
            <select class="form-control" name="id_room_type">
                <option selected value hidden>Thể loại phòng</option>
                @foreach ($room_type as $value)
                    <option @php
                    if($edit_room['id_room_type']==$value['id_room_type'])
                    {
                        echo 'selected';
                    }
                @endphp value={{$value['id_room_type']}}>{{$value['room_type']}}</option>
                @endforeach
            </select>
        </fieldset>
        <fieldset class="form-group">
            <label for="formGroupExampleInput2">Được thuê</label>
            <select class="form-control" name="is_rental">
                <option @php
                    if($edit_room['is_rental'])
                    {
                        echo 'selected';
                    }
                @endphp value=1>Đã được thuê</option>
                <option @php
                    if(!$edit_room['is_rental'])
                    {
                        echo 'selected';
                    }
                @endphp value=0>Chưa được thuê</option>
            </select>
        </fieldset>
        <button type="confirm" class="btn btn-success">Sửa</button>
    </form>
@endsection
