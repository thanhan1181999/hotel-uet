@extends('account.index')
@section('title','Phòng đã book')
@section('option')
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Loại phòng</th>
      <th>Check in</th>
      <th>Check-out</th>
      <th>Số phòng</th>
      <th>Trạng thái</th>
      <th>Xử lý</th>
    </tr>
    @foreach($account_roomtype as $art)
    <tr>
      <td>{{ $art->room_type->name }}</td>
      <td>{{ $art->check_in }}</td>
      <td>{{ $art->check_out }}</td>
      <td>{{ $art->so_phong }}</td>
      <td>@if($art->status==0) <a href="account/thanhtoan?id={{ $art->id }}">Chưa thanh toán</a> @else Đã thanh toán @endif</td>
      <td>
        <a onclick='document.cookie = "click=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";' href="account/deletebooked?id={{ $art->id }}">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection