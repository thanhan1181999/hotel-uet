<div class="row carousel-holder">
    <div class="col-md-12" style="border: 1px solid grey;">
        <div class="panel panel-default">
            <div class="panel-body">
                <form method="post" style="margin-bottom: 30px;" action="account/booking">
                    <input style="color:black;" type="hidden" name="_token" value={{ csrf_token() }}>
                    <div>
                        <label style="color:white;">Loại phòng</label>
                        <input type="hidden" name='id_room_type'>
                        <input style="color:black;" type="text" class="form-control" placeholder="Room type" name="room_type" aria-describedby="basic-addon1" disabled>
                    </div>
                    <br/>
                    <div>
                        <label style="color:white;">Số phòng</label>
                        <select class="form-control" name='so_phong'>
                        </select>
                    </div>
                     
                    @php
                    $date=date_create(date('Y-m-d'));
                    $date=date_format($date,"Y-m-d");
                    @endphp
                    <div class="container-fuild">
                        <div class="row">
                            <div class="col-md-6">
                                <label style="color:white;" style="color: white;">Check-in date</label>
                                <input style="color:black;" type="date" name="check_in_date" class="form-control" placeholder="Check-in date" aria-describedby="basic-addon1" min={{ $date }} required>
                            </div>
                            
                            <div class="col-md-6">
                                <label style="color:white;">Check-out-date</label>
                                <input style="color:black;" type="date" name="check_out_date" class="form-control" placeholder="Check-out date" aria-describedby="basic-addon1"
                                min={{ $date }} required>
                            </div>
                        </div>
                    </div>
                    <br />
                    <button style="background-color: orange;margin-bottom: 20px;" type="submit" class="btn btn-default">Booking
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>