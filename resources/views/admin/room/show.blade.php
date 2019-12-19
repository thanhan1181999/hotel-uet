@extends('admin.layouts.index')
@section('content')
<div style="overflow-x:auto;">
<a href="admin/quanly/them_room"><button style="background-color: orange;margin-bottom: 40px;" type="submit" class="btn btn-default" >Thêm phòng mới
</button></a>
  <table>
    <tr>
      <th>Mã phòng</th>
      <th>Loại phòng</th>
      <th>Xử lý</th>
    </tr>
    @foreach($room_type as $rt)
    @foreach($rt->room as $r)
    <tr>
      <td>{{ $r->so_phong }}</td>
      <td>{{ $rt->name }}</td>
      <td>
        <a href="admin/quanly/sua_room?id={{ $r->id }}">
          <i class="fa fa-pencil"></i>
        </a>
        <a href="admin/quanly/xoa_room?id={{ $r->id }}">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
    @endforeach
  </table>
</div>
@endsection