@extends('user.profileuser')
@section('title','Phòng đã book')
@section('option')
<table class="table table-hover">
    <thead>
      <tr>
        <th>Stt</th>
        <th>Id ac</th>
        <th>room_type</th>
        <th>room_no</th>
        <th>so_nguoi</th>
        <th>check_in_date</th>
        <th>check_in_time</th>
        <th>check_out_date</th>
        <th>thanhtoan</th>
        <th>created_at</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($booking as $value)
      <tr>
        <td>{{$value['id_bk']}}</td>
        <td>{{$value['id_ac']}}</td>
        <td>{{$value['room_type']}}</td>
        <td>{{$value['room_no']}}</td>
        <td>{{$value['so_nguoi']}}</td>
        <td>{{$value['check_in_date']}}</td>
        <td>{{$value['check_in_time']}}</td>
        <td>{{$value['check_out_date']}}</td>
        <td>@if ($value['thanhtoan']==true)
            Đã thanh toán
            @else
            Chưa thanh toán
        @endif</td>
        <td>{{$value['created_at']}}</td>
        {{-- gui len de xac nhan da chap nhan feedback --}}
        <td>
          <a href="delete_booked/{{$value['id_bk']}}"><i class="fa fa-trash">Hủy</i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
