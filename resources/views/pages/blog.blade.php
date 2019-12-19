@extends('layouts.index')
@section('content')
<div class="blog-background" style=" background-image: url('images/blog/bg_blog.jpg');">
        <div class="blog">
            <h1>{{-- @php echo '<pre>';
        if(isset($account)) print_r($account); else echo 'acb';
        echo '</pre>';@endphp  --}}Blog</h1>
            <a href="home">HOME</a>
            <a href="blog">BLOG</a>
        </div>
</div>
<div class="container" style="margin-top: 100px;">
    <div class="row">
        <!-- cột trái -->
        <div class="col-lg-8" style="margin-bottom:30px;">
            <div class="container" style="margin-bottom: -30px" id="showResult">
                <div class="row" >
                
                <!-- khi có 1 bài viết -->
                @if ($detailBlog==true)
                    <div class="col-md-12" style="margin-bottom: 70px;">
                        @foreach($blog as $bl)
                            <h2>{{$bl->title}}</h2>
                            <b>{{$bl->date}}</b>
                            <p>{{$bl->text1}}</p>
                            <img src="images/blog/{{$bl->image}}" alt="image" style="width: 100%;">
                            <p style="margin-top: 20px;">{{$bl->text2}}</p>
                            <b>{{$bl->author}}</b>
                        @endforeach
                    </div>
                @endif
                <!-- hiện kết quả tìm kiếm -->
                @if ($detailBlog==false)
                    @if(sizeof($blog)==0)
                    <div class="alert alert-danger" style="width: 100%"><h2>Không có bài viết nào tìm được</h2></div>
                    @endif
                @endif
                @if ($detailBlog==false)
                    @foreach ($blog as $bl)
                            <div class="col-md-6">
                                <a href="blog?id={{$bl->id}}">
                                    <div class="blog-background" style="
                                    background-image: url('images/blog/{{$bl->image}}');
                                    height: 275px;
                                    background-size: cover;
                                    background-position: center;
                                    position:relative;">
                                        <div class="meta-chart">
                                            <div>{{$bl->date}}</div>
                                            <div>{{$bl->author}}</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="blog?id={{$bl->id}}">
                                <div>
                                    <h3 class="heading">{{$bl->title}}</h3>
                                </div>
                                </a>
                            </div>
                    @endforeach
                @endif
                </div>

                <!-- phân trang -->
                <div class="fixpaginate">
                    {{ $blog->appends(Request::all())->links() }}
                </div>
            </div>
        </div>

        <!-- cột phải -->
        <div class="col-lg-4">
            <div class="container">

                <!-- search -->
                {{-- <form action="" method="get">
                    <input id="searchblog" name="keyword" type="text" placeholder="Type a keyword and hit enter" required/>
                    <button type="submit">
                        <img src="source/image/icons/search.svg"></img>
                    </button>
                </form> --}}
                <!-- The form -->
                <form style="margin-bottom: 30px;" class="search clearfix" action="blog" method="get">
                  <input type="text" placeholder="Search.." name="keyword">
                  <button type="submit"><i class="fa fa-search"></i></button>
                </form>

                <!-- random article -->
                <h3 style="margin-bottom: 40px;">Random artiles</h3>
                @foreach ($blogRandom as $bl)
                    <div class="popular-blog">
                        <div class="clearfix"{{--  style="height: 95px;" --}}>
                            <a href="blog?id={{$bl->id}}">
                                <img class="img-title" src="images/blog/{{$bl->image}}"/>
                            </a>
                            <a href="blog?id={{$bl->id}}">
                                <span>{{$bl->title}}<br/></span>
                            </a>
                        </div>
                        <div class="infor-blog">
                            <i class="fa fa-calendar fa-2x"></i>&nbsp;{{$bl->date}}&nbsp;&nbsp;
                            <i class="fa fa-user fa-2x"></i>&nbsp;{{$bl->author}}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection