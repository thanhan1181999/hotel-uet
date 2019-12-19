@extends('admin.layouts.index')
@section('content')
<div class="row carousel-holder">
    <div class="col-md-12" style="border: 1px solid grey;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" style="margin-bottom: 30px;" action="admin/quanly/them_blog" enctype="multipart/form-data">
                    <input style="color:black;" type="hidden" name="_token" value={{ csrf_token() }}>                     
                    <div>
                        <label>Tiêu đề</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Tiêu đề" name="title" aria-describedby="basic-addon1" value="">
                    </div>                     
                    <br />
                    <div>
                        <label>Văn bản đầu</label>
                        <textarea style="color:black;" rows="6" cols="50" class="form-control" placeholder="Văn bản đầu" name="text1" aria-describedby="basic-addon1"></textarea>
                    </div>                     
                    <br />
                    <div>
                        <label>Văn bản cuối</label>
                        <textarea style="color:black;" rows="6" cols="50" class="form-control" placeholder="Văn bản cuối" name="text2" aria-describedby="basic-addon1"></textarea>
                    </div>                   
                    <br />
                    <div>
                        <label>Ngày tạo</label>
                        <input style="color:black;" type="date" class="form-control" placeholder="Ngày tạo" name="date" aria-describedby="basic-addon1" value="">
                    </div>
                    <br />
                    <div>
                        <label>Tác giả</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Tác giả" name="author" aria-describedby="basic-addon1" value="">
                    </div>
                    <br />
                    <div>
                        <label>Hình ảnh</label>
                        <input style="color:black;" type="file" class="form-control" name="image" aria-describedby="basic-addon1">
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