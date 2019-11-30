@extends('admin.dashboard')
@section('table-option')
<table class="table table-hover">
    <thead>
      <tr>
        <th>Stt</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Message</th>
        <th>Accept</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($feedback as $value)
      <tr>
        <td>{{$value['id_feedback']}}</td>
        <td>{{$value['name']}}</td>
        <td>{{$value['email']}}</td>
        <td>{{$value['phone']}}</td>
        <td>{{$value['message']}}</td>
        {{-- gui len de xac nhan da chap nhan feedback --}}
        <td>
          <a href="delete_feedback/{{$value['id_feedback']}}"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
