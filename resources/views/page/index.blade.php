@extends('master')
@section('content')
  <!-- header -->
  <div class="header">
        <div class="h-left"></div>
        <div class="h-right owl-carousel" style="z-/: unset;">
            <div class="owl-items owl-item-1 "></div>
            <div class="owl-items owl-item-2 "></div>
            <div class="owl-items owl-item-3 "></div>
            <div class="owl-items owl-item-4 "></div>
        </div>
        <div class="h-contain-text">
            <h2>Welcome to IslaGrande Hotel</h2>
            <h1>A Perfect Place To Stay</h1>
        </div>
    </div>

        <!-- Calendar Book -->

    <div class="component-1">
            <div class="container">
                    <div class="row sub-1">
                        <form action="{{ route('suggest_room') }}" method="post">
                            {{csrf_field()}}
                        </form>
                            <div class="col-lg-1 title"><h3 class="text-center text-danger"></h3></div>
                            <div class="col-lg-2">
                                    <label  for="#">Check-in Date</label>
                                    <input name="check_in_date" class="form-control" type="date" placeholder="Check-in date">
                            </div>

                            <div class="col-lg-2">
                                   <label for="#">Check-out Date</label>
                                    <input name="check_out_date" class="form-control" type="date" placeholder="Check-out date">
                            </div>

                            <!-- *** -->
                            <div class="col-lg-2">
                                    <label for="#">Room Types</label>
                                    <select name="room_type_id" class="form-control">
                                            @foreach ($room_type as $element)
                                             <option value="{{$element['id_room_type']}}">{{$element['room_type']}}</option>
                                            @endforeach

                                    </select>
                            </div>

                            <div class="col-lg-2">
                                           <label for="#">Adults</label>
                                            <select name="Adult-Type" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                            </select>

                            </div>

                            <div class="col-lg-2">
                                <label for="#">Children</label>
                                <select name="Children-Type" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                </select>

                            </div>

                            <div class="col-lg-1">
                                <a href="room" class="btn custom" style="width: 100%; padding-left: 5px;">Gợi ý</a>
                            </div>

                    </div>

            </div>
    </div>

    <!-- Slide -->

    <div class="component-2">
        <div class="container">
           <div class="row">
                <div class="col-sm-12 custom-text">
                    <h1>ROOMS</h1>
                </div>
           </div>

           <div class="row text-content">
                <div class="col-sm-12"><h2 style="text-align: center;">Book A Room</h2></div>
           </div>

           <div class="row text-content">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <p style="font-size: 20px; text-align: center;" class="font-italic">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
                <div class="col-sm-1"></div>
           </div>
        </div>

        <div class="container sub-2-2">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                                <div class="carousel-item active">
                                        <div class="row item">
                                            @for ($i = 0; $i < 3; $i++)

                                                <!-- Column-1 -->
                                            <div class="col-sm-4">
                                                <div class="row-sm-6"><img src="{{$room_type[$i]['image_room']}}" alt="#"></div>
                                                <div class="row-sm-1 custom-row">
                                                    <p class="rate">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                    </p>
                                                </div>
                                                <div class="row-sm-1"><hr></div>
                                                <div class="row">
                                                        <div class="col-5 col-md-4 set-color">Giá phòng: </div>
                                                        <div class="col-2 col-md-5 set-color">${{$room_type[$i]['price']}}/đêm</div>
                                                 </div>
                                                <div class="row book-review">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-4">
                                                        <a class="btn btn-success set-size" href="user/booking_form/{{$room_type[$i]['id_room_type']}}">Đặt phòng</a>

                                                    </div>
                                                </div>
                                            </div>
                                            @endfor
                                        </div>
                                <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                </div>
                        </div>
                        <div class="carousel-item">
                                <div class="row item">
                                       @for ($i = 3; $i < 6; $i++)

                                                <!-- Column-1 -->
                                            <div class="col-sm-4">
                                                <div class="row-sm-6"><img src="{{$room_type[$i]['image_room']}}" alt="#"></div>
                                                <div class="row-sm-1 custom-row">
                                                    <p class="rate">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                    </p>
                                                </div>
                                                <div class="row-sm-1"><hr></div>
                                                <div class="row">
                                                        <div class="col-5 col-md-4 set-color">Giá phòng: </div>
                                                        <div class="col-2 col-md-5 set-color">${{$room_type[$i]['price']}}/đêm</div>
                                                 </div>
                                                <div class="row book-review">
                                                    <div class="col-sm-3"></div>
                                                    <div class="col-sm-4">
                                                        <a class="btn btn-success set-size" href="user/booking_form/{{$room_type[$i]['id_room_type']}}">Đặt phòng</a>

                                                    </div>
                                                </div>
                                            </div>
                                            @endfor

                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                </div>
                        </div>

                        </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                </a>
                        </div>
        </div>

    </div>

    <div class="component-3">
            <div class="container">
                    <div class="row info-customer">
                        <div class="col-sm-3">
                                <div class="row"><p style="font-size: 25px;"><strong>50</strong></p></div>
                                <div class="row"><span>Hotel Branches</span></div>
                        </div>

                        <div class="col-sm-3">
                                <div class="row"><p style="font-size: 25px;"><strong>20000</strong></p></div>
                                <div class="row"><span>Happy Guests</span></div>
                        </div>

                        <div class="col-sm-2">
                                <div class="row"><p style="font-size: 25px;"><strong>100</strong></p></div>
                                <div class="row"><span>Rooms</span></div>
                        </div>

                        <div class="col-sm-2">
                                <div class="row"><p style="font-size: 25px;"><strong>100</strong></p></div>
                                <div class="row"><span>Destionations</span></div>
                        </div>
                    </div>
            </div>
    </div>

    <div class="component-4">
        <div class="container">
                <div class="row">
                        <div class="col-lg-6">
                                <img src="source/image/sea.jpg" alt="#" style="width: 100%; padding-top: 100px; padding-bottom: 20px;">
                        </div>



                        <div class="col-lg-6 content-about">
                                <h2 style="padding-left: 20px;">WellCome to HaNoi International Hotal</h2>
                                <div class="">On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</div>
                                <br>
                                <div class="">When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</div>
                                <br>
                                <div class="">
                                        <a href="" style="margin-left: 10px"><i class="fa fa-twitter fa-2x"></i></a>
                                        <a href="https://www.facebook.com/BTL-Hotel-103136754520187/?modal=admin_todo_tour" style="margin-left: 10px"><i class="fa fa-facebook fa-2x"></i></a>
                                        <a href="#" style="margin-left: 10px"><i class="fa fa-google-plus fa-2x"></i></a>
                                        <a href="#" style="margin-left: 10px"><i class="fa fa-instagram fa-2x"></i></a>
                                </div>
                        </div>
                </div>
        </div>
    </div>
@endsection
