@extends('master')
@section('content')

<div class="container">
        <div class="row" >
            <div class="booking-form col-sm-8 push-sm-4">
                <div class="formheader text-xs-center" style="color: white;">
                    <h1>Your Booking Form</h1>
                </div>
                <form action="{{route('booking')}}" class="form-group" method="POST">
                     {{csrf_field()}}
                        <div class="form-group">
                            <span style="position: absolute;padding-left: 20px; color: orange;">Name</span>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Jane Doe" value="{{$account['name']}}" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail2" style="position: absolute;padding-left: 20px; color: orange;">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$account['email']}}" placeholder="abcxyx@gmail.com" style="height: 60px; padding-top: 20px;padding-left: 20px; border-radius: 30px;">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail2" style="position: absolute;padding-left: 20px; color: orange;">Telephone</label>
                                    <input type="number" class="form-control" name="phone" id="phone" value="{{$account['phone']}}" placeholder="0123456789" style="height: 60px; padding-top: 20px;padding-left: 20px; border-radius: 30px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <span style="position: absolute;padding-left: 20px; color: orange;">Address</span>
                            <input type="text" class="form-control" name="address" id="address" value="{{$account['address']}}" placeholder="City,Street" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span style="position: absolute;padding-left: 20px; color: orange;">Room Type</span>
                                    <select class="form-control" name="room_type" style="height: 60px; padding-top: 20px; padding-left: 15px;border-radius: 30px; ">
                                        <option selected value hidden>Select Room Type</option>
                                        @foreach ($room_type as $value)
                                            <option value={{$value['id_room_type']}}>{{$value['room_type']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <span style="position: absolute;padding-left: 20px; color: orange;">People</span>
                                    <select class="form-control" name="so_nguoi" style="height: 60px; padding-top: 20px; padding-left: 15px;border-radius: 30px; ">
                                        <option selected value hidden>Choose Peple</option>
                                        <option value=1>1</option>
                                        <option value=2>2</option>
                                        <option value=3>3</option>
                                        <option value=4>4</option>
                                        <option value=5>5</option>
                                        <option value=6>6</option>
                                        <option value=7>7</option>
                                        <option value=8>8</option>
                                        <option value=9>9</option>
                                        <option value=10>10</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span style="position: absolute;padding-left: 20px; color: orange;">check In Date</span>
                                    <input type="Date" class="form-control" name="check_in_date" id="check_in_date" placeholder="Conntry,City" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span style="position: absolute;padding-left: 20px; color: orange;">Check In Time:</span>
                                    <input type="Time" class="form-control" name="check_in_time" id="check_in_time" placeholder="Conntry,City" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span style="position: absolute;padding-left: 20px; color: orange;">Check Out Date :</span>
                                    <input type="Date" class="form-control" name="check_out_date" id="check_out_date" placeholder="Conntry,City" style="height: 60px; padding-top: 20px; padding-left: 20px;border-radius: 30px;">
                                </div>
                            </div>
                        </div>

                    <button type="submit" class="form-control btn btn-warning">Send invitation</button>
                </form>
            </div>
        </div>
    </div>
@endsection
