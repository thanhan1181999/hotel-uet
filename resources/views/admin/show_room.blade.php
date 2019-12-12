@extends('admin.dashboard')
@section('table-option')
<a href="insert_room" class="btn btn-success">Thêm Room</a>
<table class="table table-hover">
    <thead>
      <tr>
        <th>Số phòng</th>
        <th>Id Room type</th>
        <th>Được thuê</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($room as $value)
      <tr>
        <td>{{$value['room_no']}}</td>
        <td>{{$value['id_room_type']}}</td>
        <td>@php
          if ($value['so_booking']>0) {
            echo 'Đã được thuê';
          }
          else {
             echo 'Chưa được thuê';
            }
        @endphp
        </td>
        {{-- gui len de xac nhan da chap nhan feedback --}}
        <td>
          <a href="edit_room/{{$value['room_no']}}"><i class="fa fa-pencil"></i></a>
          <a href="delete_room/{{$value['room_no']}}"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
