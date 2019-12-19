@extends('account.index')
@section('title','Profile user')
@section('option')
@php $account=session()->get('account') @endphp
<div class="row carousel-holder">
    <div class="col-md-12" style="border: 1px solid grey;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" style="margin-bottom: 30px;" action="editProfile">
                    <input style="color:black;" type="hidden" name="_token" value={{ csrf_token() }}>
                    <div>
                        <label>Name</label>
                        <input type="hidden" name='id_room_type'>
                        <input style="color:black;" type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1" disabled value="{{ $account->name }}">
                    </div>
                    <br/>
                    <div>
                        <label>Email</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" disabled value="{{ $account->email }}">
                    </div>
                     
                    <br />
                    <div>
                        <label>Address</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Address" name="address" aria-describedby="basic-addon1" value="{{ $account->address }}">
                    </div>
                     
                    <br />
                    <div>
                        <label>Phone</label>
                        <input style="color:black;" type="number" class="form-control" placeholder="Phone" name="phone" aria-describedby="basic-addon1" value="{{ $account->phone }}" max="9999999999999">
                    </div>
                     
                    <br />
                    <div>
                        <label style="color:white;">Gender</label>
                        <select class="form-control" name='gender'>
                        	<option value="0" @if($account->gender==0) selected @endif>Nam</option>
                        	<option value="1" @if($account->gender==1) selected @endif>Nữ</option>
                        	<option value="2" @if($account->gender==2) selected @endif>Khác</option>
                        </select>
                    </div>
                    <br>
                    <button style="background-color: orange" type="submit" class="btn btn-default" onclick='document.cookie = "click=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";'>Update profile
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection