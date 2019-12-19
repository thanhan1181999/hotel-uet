@extends('layouts.index')

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
                        <form action="suggest" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-5">
                                        @php
                                        $date=date_create(date('Y-m-d'));
                                        $date=date_format($date,"Y-m-d");
                                        @endphp
                                        <label for="#">Check-in Date</label>
                                        <input required name="check_in_date" class="form-control" type="date" placeholder="Check-in date" min={{ $date }}>
                                    </div>

                                    <div class="col-lg-5">
                                       <label for="#">Check-out Date</label>
                                        <input required name="check_out_date" class="form-control" type="date" placeholder="Check-out date" min={{ $date }}>
                                    </div>

                                    <!-- *** -->

                                    <div class="col-lg-2">
                                        <button type="submit" class="btn custom" style="width: 100%; padding-left: 5px;">Gợi ý</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

            </div>
    </div>

    <div class="component-3" style="position: relative;">
            <div class="container" style="position: absolute;top:50%;left: 50%;transform: translate(-50%,-50%);">
                    <div class="row">
                        <div class="col-sm-3" style="text-align: center;">
                                <p style="font-size: 25px;"><strong>50</strong></p>
                                <span style="font-size: 20px;">Hotel Branches</span>
                        </div>

                        <div class="col-sm-3" style="text-align: center;">
                                <p style="font-size: 25px;"><strong>20000</strong></p>
                                <span style="font-size: 20px;">Happy Guests</span>
                        </div>

                        <div class="col-sm-3" style="text-align: center;">
                                <p style="font-size: 25px;"><strong>100</strong></p>
                                <span style="font-size: 20px;">Rooms</span>
                        </div>

                        <div class="col-sm-3" style="text-align: center;">
                                <p style="font-size: 25px;"><strong>100</strong></p>
                                <span style="font-size: 20px;">Destionations</span>
                        </div>
                    </div>
            </div>
    </div>

    <div class="component-4" style="margin-bottom: 50px">
        <div class="container">
                <div class="row">
                        <div class="col-lg-6">
                                <img src="images/home/sea.jpg" alt="#" style="width: 100%; padding-top: 100px; padding-bottom: 20px;">
                        </div>



                        <div class="col-lg-6 content-about">
                                <h2 style="padding-left: 20px;">WellCome to HaNoi International Hotal</h2>
                                <div class="">On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</div>
                                <br>
                                <div class="">When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</div>
                                <br>
                                <div class="">
                                        <a href="http://fb.com/" style="margin-left: 10px"><i class="fa fa-twitter fa-2x"></i></a>
                                        <a href="https://www.facebook.com/BTL-Hotel-103136754520187/?modal=admin_todo_tour" style="margin-left: 10px"><i class="fa fa-facebook fa-2x"></i></a>
                                        <a href="http://fb.com/" style="margin-left: 10px"><i class="fa fa-google-plus fa-2x"></i></a>
                                        <a href="http://fb.com/" style="margin-left: 10px"><i class="fa fa-instagram fa-2x"></i></a>
                                </div>
                        </div>
                </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
    $('input[name="check_in_date"]').change(function() {
        $('input[name="check_out_date"]').attr('min',$(this).val());
    });
    $('input[name="check_out_date"]').change(function() {
        $('input[name="check_in_date"]').attr('max',$(this).val());
    });
</script>
@endsection