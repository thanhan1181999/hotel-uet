@extends('admin.layouts.index')
@section('content')
<div class="row carousel-holder">
    <div class="col-md-12" style="border: 1px solid grey;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" style="margin-bottom: 30px;" action="admin/quanly/them_room">
                    <input style="color:black;" type="hidden" name="_token" value={{ csrf_token() }}>                     
                    <div>
                        <label style="color:white;">Loại phòng</label>
                        <select class="form-control" name='room_type'>
                            @foreach($room_type as $rt)
                            <option value="{{ $rt->id }}">{{ $rt->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Mã phòng</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Mã phòng" name="so_phong" aria-describedby="basic-addon1" value="">
                    </div>
                    <br />  
                    <button style="background-color: orange" type="submit" class="btn btn-default" >Tiến hành thêm
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection