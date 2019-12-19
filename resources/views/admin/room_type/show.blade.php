@extends('admin.layouts.index')
@section('content')
<a href="admin/quanly/them_room_type"><button style="background-color: orange;margin-bottom: 40px;" type="submit" class="btn btn-default" >Thêm loại phòng mới
</button></a>
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Name</th>
      <th>Giá</th>
      <th>Diện tích</th>
      <th>Tiêu đề</th>
      <th>Mô tả</th>
      <th>Số ngày được đặt trước</th>
      {{-- <th>Quyền lợi</th>
      <th>Dịch vụ</th>
      <th>Hình ảnh</th> --}}
      <th>Xử lý</th>
    </tr>
    @foreach($room_type as $rt)
    <tr>
      <td>{{ $rt->name }}</td>
      <td>{{ $rt->price.' '.$rt->unitPrice }}</td>
      <td>{{ $rt->area.' '.$rt->unitArea }}</td>
      <td>{{ $rt->title }}</td>
      <td>{{ $rt->description }}</td>
      <td>{{ $rt->so_ngay }}</td>
      {{-- <td>
        @php
          $ql=$rt->quyenloi_room;
          if(sizeof($ql) != 0) {
             echo '<ul style="list-style-type: none;">';
            foreach ($ql as $value) {
              echo '<li>'.$value->description.'</li>';
            }
             echo '</ul>';
          }
        @endphp
      </td>
      <td>
        @php
          $sv=$rt->service_room;
          if(sizeof($ql) != 0) {
             echo '<ul style="list-style-type: none;">';
            foreach ($sv as $value) {
              echo '<li>'.$value->description.'</li>';
            }
             echo '</ul>';
          }
        @endphp
      </td>
      <td>
        @php
          $img=$rt->image_room;
          if(sizeof($img) != 0) {
             echo '<ul style="list-style-type: none;">';
            foreach ($img as $value) {
              echo '<li><a target="_blank" href="images/room/'.$rt->id.'/'.$value->name.'">'.'Link</a></li>';
            }
             echo '</ul>';
          }
        @endphp
      </td> --}}
      <td>
        <a href="admin/quanly/sua_room_type?id={{ $rt->id }}">
          <i class="fa fa-pencil"></i>
        </a>
        <a href="admin/quanly/xoa_room_type?id={{ $rt->id }}">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection