@extends('admin.layouts.index')
@section('content')
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Messeage</th>
      <th>Xử lý</th>
    </tr>
    @foreach($feedback as $fb)
    <tr>
      <td>{{ $fb->name }}</td>
      <td>{{ $fb->email }}</td>
      <td>{{ $fb->phone }}</td>
      <td>{{ $fb->message }}</td>
      <td>
        <a href="admin/quanly/delete_feedback?id={{ $fb->id }}">
          <i class="fa fa-trash"></i>
        </a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection