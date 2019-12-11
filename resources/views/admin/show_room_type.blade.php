@extends('admin.dashboard')
@section('table-option')
<a href="insert_room_type" class="btn btn-success">Thêm Room Type</a>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Stt</th>
        <th>Room type</th>
        <th>Số phòng trống</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Trích dẫn</th>
        <th>Diện tích</th>
        <th>Quyền lợi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($room_type as $value)
      <tr>
        <td>{{$value['id_room_type']}}</td>
        <td>{{$value['room_type']}}</td>
        <td>{{$value['so_phong_trong']}}</td>
        <td>{{$value['image_room']}}</td>
        <td>{{$value['price']}}</td>
        <td>{{$value['trich_dan']}}</td>
        <td>{{$value['dien_tich']}}</td>
        <td>{{$value['quyen_loi']}}</td>
        {{-- gui len de xac nhan da chap nhan feedback --}}
        <td>
          <a href="edit_room_type/{{$value['id_room_type']}}"><i class="fa fa-pencil"></i></a>
          <a href="delete_room_type/{{$value['id_room_type']}}"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
