@extends('admin.layouts.index')
@section('content')
<div class="row carousel-holder">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                    <label style="color:white;">Xem theo</label>
                    <select class="form-control" name='optionChoose'>
                        <option value="0">Tất cả</option>
                        <option value="1">Ngày check-in</option>
                        <option value="1">Ngày check-out</option>
                    </select>
                </div>
                <br>
                <div>
                    <label>Chọn ngày</label>
                    <input style="color:black;" type="date" class="form-control" name="date" aria-describedby="basic-addon1" value="" disabled="disabled">
                </div>
                <br />
                <button style="background-color: orange;margin-bottom: 30px;" type="button" class="btn btn-default" >Xem</button>
            </div>
        </div>
    </div>
</div>
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Email</th>
      <th>SĐT</th>
      <th>Loại phòng</th>
      <th>Check-in</th>
      <th>Check-out</th>
      <th>Số phòng</th>
      <th>Trạng thái</th>
      <th>Xử lý</th>
      <th>Các phòng đặt</th>
    </tr>
    @php
    $datenow=date_create(date('Y-m-d'));
    $datenow=date_format($datenow,"Y-m-d");
    @endphp
    @foreach($account_roomtype as $acr)
    <tr>
      <td>{{ $acr->account->name }}</td>
      <td>{{ $acr->account->email }}</td>
      <td>{{ $acr->room_type->name }}</td>
      <td>{{ $acr->check_in }}</td>
      <td>{{ $acr->check_out }}</td>
      <td>{{ $acr->so_phong }}</td>
      <td>@if($acr->status==0) Chưa thanh toán @else Đã thanh toán @endif</td>
      <td>
        @if($acr->status==0)
        <a href="admin/quanly/delete_booked?id={{ $acr->id }}">
          <i class="fa fa-trash"></i>
        </a>
        @else
          @if($acr->check_in==$datenow && $acr->check_checkin==0) <a href="admin/quanly/check_ỉn_room?id={{ $acr->id }}">Check-in</a><br/> @endif
          @if($acr->check_out==$datenow) <a href="admin/quanly/check_out_room?id={{ $acr->id }}">Check-out</a> @endif
        @endif
      </td>
      <td>
        @foreach($acr->room as $acrr)
          {{ $acrr->so_phong }}<br/>
        @endforeach
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection
@section('js')
<script type="text/javascript">
  $('select[name="optionChoose"]').change(function() {
    option=$(this).val();
    if(option !=0) {
      $('input[name="date"]').removeAttr('disabled');
    } else {
      $('input[name="date"]').attr('disabled','');
    }
  });
</script>
@endsection