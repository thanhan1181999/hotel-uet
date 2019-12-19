@extends('admin.layouts.index')
@section('js')
    <script type="text/javascript">
        $('.edit_dv').click(function() {
            var id_dv=$(this).attr('stt');
            $('input[name="dv"]').val(id_dv);
            $.get('ajax/dv_room_type/'+id_dv,function(data) {
                // alert(data);
                $('input[name="content_edit"]').val(data);
                $('#button-active_edit').click();
                $('#form-modal_rt').attr('action','admin/quanly/sua_room_type');
            });
            // $('input[name="content_edit"]').attr('value',$(name).html());
            // $('#button-active_edit').click();
        });
    </script>
@endsection
@section('content')
<div class="row carousel-holder">
    <div class="col-md-12" style="border: 1px solid grey;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" style="margin-bottom: 30px;" action="admin/quanly/them_room_type">
                    <input style="color:black;" type="hidden" name="_token" value={{ csrf_token() }}>
                    <div>
                        <label>Name</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Name" name="name" aria-describedby="basic-addon1" value="">
                    </div>
                    <br/>
                    <div>
                        <label>Giá</label>
                        <input style="color:black;" type="number" class="form-control" placeholder="Price" name="price" aria-describedby="basic-addon1" value="">
                    </div>
                     
                    <br />
                    <div>
                        <label>Đơn vị giá</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Đơn vị giá" name="unitPrice" aria-describedby="basic-addon1" value="">
                    </div>
                     
                    <br />
                    <div>
                        <label>Tiêu đề</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Tiêu đề" name="title" aria-describedby="basic-addon1" value="">
                    </div>                     
                    <br />
                    <div>
                        <label>Mô tả</label>
                        <textarea style="color:black;" rows="5" cols="50" class="form-control" placeholder="Mô tả" name="description" aria-describedby="basic-addon1"></textarea>
                    </div>                     
                    <br />
                    <div>
                        <label>Diện tích</label>
                        <input style="color:black;" type="number" class="form-control" placeholder="Diện tích" name="area" aria-describedby="basic-addon1" value="">
                    </div>
                     
                    <br />
                    <div>
                        <label>Đơn vị diện tích</label>
                        <input style="color:black;" type="text" class="form-control" placeholder="Đơn vị diện tích" name="unitArea" aria-describedby="basic-addon1" value="">
                    </div>
                     
                    <br />
                    <div>
                        <label>Số ngày được đặt trước</label>
                        <input style="color:black;" type="number" class="form-control" placeholder="Số ngày" name="so_ngay" aria-describedby="basic-addon1" value="" max=1000>
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