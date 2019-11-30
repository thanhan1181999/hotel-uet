@extends('admin.dashboard')
@section('table-option')
<h2>Update Password</h2>
<form action="{{route('update_ad_password')}}" method="post">
    {{csrf_field()}}
    <input type="password" name="update_ad_password" value="{{$password}}">
    <button type="submit" class="btn btn-success">Update</button>
</form>
 @endsection
