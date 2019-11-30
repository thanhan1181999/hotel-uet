
@extends('master')
@section('content')
<div class="blog-background" style=" background-image: url('source/image/bg_3.jpg');">
        <div class="blog">
            <h1>Blog</h1>
            <a href="#">HOME</a>
            <a href="#">BLOG</a>
        </div>
    </div>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8" style="margin-bottom:30px;">
                <div class="container" style="margin-bottom: -30px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="blog-background" style="height: 275px; background-image: url('source/image/blog/image_1.jpg');"></div>
                            <div>
                                <h3 class="heading">Even the all-powerful Pointing has no control about the blind texts</h3>
                            </div>
                            <div class="meta-chart">
                                <div><a href="#">Sep.20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><img src="source/image/icons/message.svg" /><a style="margin-left: 5px;" href="#">3</a></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-background" style="height: 275px; background-image: url('source/image/blog/image_2.jpg');"></div>
                            <div>
                                <h3 class="heading">Even the all-powerful Pointing has no control about the blind texts</h3>
                            </div>
                            <div class="meta-chart">
                                <div><a href="#">Sep.20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><img src="source/image/icons/message.svg" /><a style="margin-left: 5px;" href="#">3</a></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-background" style="height: 275px; background-image: url('source/image/blog/image_3.jpg');"></div>
                            <div>
                                <h3 class="heading">Even the all-powerful Pointing has no control about the blind texts</h3>
                            </div>
                            <div class="meta-chart">
                                <div><a href="#">Sep.20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><img src="source/image/icons/message.svg" /><a style="margin-left: 5px;" href="#">3</a></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-background" style="height: 275px; background-image: url('source/image/blog/image_4.jpg');"></div>
                            <div>
                                <h3 class="heading">Even the all-powerful Pointing has no control about the blind texts</h3>
                            </div>
                            <div class="meta-chart">
                                <div><a href="#">Sep.20, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><img src="source/image/icons/message.svg" /><a style="margin-left: 5px;" href="#">3</a></div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 77px;text-align: center;">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>  
            </div>
            <div class="col-lg-4">
                <div class="container">
                    <form>
                        <input type="text" placeholder="Type a keyword and hit enter" /><img src="source/image/icons/search.svg"></img>
                    </form>

                    <div>
                        <h3>Categories</h3>
                        <ul class="categories">
                            <li>Family<span>1</span></li><hr/>
                            <li>Criminal<span>4</span></li><hr/>
                            <li>Business<span>5</span></li><hr/>
                            <li>Family<span>6</span></li>
                        </ul>
                    </div>

                    <h3 style="margin-bottom: 40px;">Popular artiles</h3>

                    <div class="popular-blog">
                        <div><img class="img-title" src="source/image/blog/image_1.jpg"/></div>
                        <div>
                            <span>Even the all-powerful Pointing has no control about the blind texts<br/></span>
                            <div class="infor-blog">
                                <img src="source/image/icons/calendar.svg" /><a href="#">Oct. 04. 2018</a>
                                <img src="source/image/icons/user.svg" /><a href="#">Dave lewis</a>
                                <img src="source/image/icons/message.svg" /><a href="#">5</a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-blog">
                        <div><img class="img-title" src="source/image/blog/image_2.jpg"/></div>
                        <div>
                            <span>Even the all-powerful Pointing has no control about the blind texts<br/></span>
                            <div class="infor-blog">
                                <img src="source/image/icons/calendar.svg" /><a href="#">Oct. 04. 2018</a>
                                <img src="source/image/icons/user.svg" /><a href="#">Dave lewis</a>
                                <img src="source/image/icons/message.svg" /><a href="#">5</a>
                            </div>
                        </div>
                    </div>
                    <div class="popular-blog">
                        <div><img class="img-title" src="source/image/blog/image_3.jpg"/></div>
                        <div>
                            <span>Even the all-powerful Pointing has no control about the blind texts<br/></span>
                            <div class="infor-blog">
                                <img src="source/image/icons/calendar.svg" /><a href="#">Oct. 04. 2018</a>
                                <img src="source/image/icons/user.svg" /><a href="#">Dave lewis</a>
                                <img src="source/image/icons/message.svg" /><a href="#">5</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
