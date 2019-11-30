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
            <!-- cột trái -->
            <div class="col-lg-8" style="margin-bottom:30px;">
                <div class="container" style="margin-bottom: -30px" id="showResult">
                    <div class="row" >
                    <!-- hiện kết quả tìm kiếm -->
                    @if (isset($search) && sizeof($blog) == 0)
                        <h4>Không có bài viết nào tìm được</h4>
                    @endif
                    <!-- khi có 1 bài viết -->
                    @if (sizeof($blog) == 1 && !isset($search))
                        @foreach ($blog as $value)  
                                <div class="col-md-12">
                                    <h2>{{$value->title}}</h2>
                                    <b>{{$value->date}}</b>                                    
                                    <p>{{$value->text1}}</p>
                                    <img src="{{$value->image}}" alt="image" style="width: 100%;">
                                    <p>{{$value->text2}}</p>
                                    <b>{{$value->author}}</b>                           
                                </div>   
                        @endforeach      
                    @endif
                    @if (sizeof($blog) > 1)
                        @foreach ($blog as $value)   
                                <div class="col-md-6">
                                    <a href="/blog?id={{$value->id}}">
                                        <div class="blog-background" style="
                                        background-image: url({{$value->image}});
                                        height: 275px; 
                                        background-size: cover;
                                        background-position: center;
                                        position:relative;">
                                            <div class="meta-chart">
                                                <div>{{$value->date}}</div>
                                                <div>{{$value->author}}</div>
                                            </div>  
                                        </div>
                                    </a>
                                    <a href="/blog?id={{$value->id}}">
                                    <div>
                                        <h3 class="heading">{{$value->title}}</h3>
                                    </div>   
                                    </a>                                                            
                                </div>      
                        @endforeach        
                    @endif               
                    </div>

                    <!-- phân trang -->
                    <div style="height: 77px;text-align: center;">
                        {!!$blog->links()!!}
                    </div>
                </div>  
            </div>

            <!-- cột phải -->
            <div class="col-lg-4">
                <div class="container">

                    <!-- search -->
                    <form action="" method="get">
                        <input id="searchblog" name="keyword" type="text" placeholder="Type a keyword and hit enter" required/>
                        <button type="submit">
                            <img src="source/image/icons/search.svg"></img>
                        </button>
                    </form>

                    <!-- random article -->
                    <h3 style="margin-bottom: 40px;">Random artiles</h3>
                    @foreach ($blogRandom as $value)   
                        <div class="popular-blog">
                            <div>
                                <a href="/blog?id={{$value->id}}">
                                    <img class="img-title" src="{{$value->image}}"/>
                                </a>
                            </div>
                            <div>
                                <a href="/blog?id={{$value->id}}">
                                    <span>{{$value->title}}<br/></span>
                                </a>                                
                                <div class="infor-blog">
                                    <img src="source/image/icons/calendar.svg" />{{$value->date}}
                                    <img src="source/image/icons/user.svg" />{{$value->author}}
                                </div>
                            </div>
                        </div>          
                    @endforeach        
              
                </div>
            </div>
        </div>
    </div>
@endsection


