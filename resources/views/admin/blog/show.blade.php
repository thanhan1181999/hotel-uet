@extends('admin.layouts.index')
@section('content')
<div style="overflow-x:auto;">
<a href="admin/quanly/them_blog"><button style="background-color: orange;margin-bottom: 40px;" type="submit" class="btn btn-default" >Thêm blog mới
</button></a>
  <table>
    <tr>
      <th>Tiêu đề</th>
      <th>Văn bản đầu</th>
      <th>Văn bản cuối</th>
      <th>Ngày tạo</th>
      <th>Tác giả</th>
      <th>Hình ảnh</th>
      <th>Xử lý</th>
    </tr>
    @foreach($blog as $bl)
    <tr>
      <td>{{ $bl->title }}</td>
      <td>{{ $bl->text1 }}</td>
      <td>{{ $bl->text2 }}</td>
      <td>{{ $bl->date }}</td>
      <td>{{ $bl->author }}</td>
      <td>{!! '<a target="_blank" href="images/blog/'.$bl->image.'">'.'Link</a>' !!}</td>
      <td>
        <a href="admin/quanly/sua_blog?id={{ $bl->id }}">
          <i class="fa fa-pencil"></i>
        </a>
        <a href="admin/quanly/xoa_blog?id={{ $bl->id }}">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection