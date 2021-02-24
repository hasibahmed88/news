@extends('front.master')

@section('title')
Home
@endsection

@section('body')

<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <h6 class=" text-success">{{ Session::get('message') }}</h6>
                <div class="headline">
                    <div class="nav" id="headline-nav">
                        <a class="left carousel-control" role="button" data-slide="prev">
                            <span class="ion-ios-arrow-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" role="button" data-slide="next">
                            <span class="ion-ios-arrow-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="owl-carousel owl-theme" id="headline">
                        <div class="item">
                            <a href="#"><div class="badge">Tip!</div> Vestibulum ante ipsum primis in faucibus orci</a>
                        </div>
                        <div class="item">
                            <a href="#">Ut rutrum sodales mauris ut suscipit</a>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel owl-theme slide" id="featured">
                @foreach($hot_newses as $hot_news)
                    <div class="item">
                        <article class="featured">
                            <div class="overlay"></div>
                            <figure>
                                <img src="{{ asset('/') }}admin/blog-image/{{ $hot_news->blog_image }}" alt="Sample Article">
                            </figure>
                            <div class="details">
                                <div class="category"><a href="{{ route('category-news',['id'=>$hot_news->category_id]) }}">{{ $hot_news->category_name }}</a></div>
                                <h1><a href="{{ route('blog-details',['id'=>$hot_news->id]) }}">{{ $hot_news->blog_title }}</a></h1>
                                <div class="time">{{ date('M-m-Y', strtotime($hot_news->created_at)) }}</div>
                            </div>
                        </article>
                    </div>
                @endforeach
                </div>
                <div class="line">
                    <div>Latest News</div>
                </div>
                <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-12 col-md-6">
                        <article class="article col-md-12">
                            <div class="inner">
                                <figure>
                                    <a href="{{ route('blog-details',['id'=>$blog->id]) }}">
                                        <img src="{{ asset('/') }}admin/blog-image/{{ $blog->blog_image }}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <div class="detail">
                                        <div class="time">{{ date('M-m-Y', strtotime($blog->created_at)) }}</div>
                                        <div class="category"><a href="{{ route('category-news',['id'=>$blog->category_id]) }}">{{ $blog->category_name }}</a></div>
                                    </div>
                                    <h2><a href="{{ route('blog-details',['id'=>$blog->id]) }}">{{ Str::limit($blog->blog_title, 40, '...') }}</a></h2>
                                    <p>
                                        {{ Str::limit($blog->blog_short_description, 100, '...') }}
                                    </p>
                                    <footer>
                                        <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1263</div></a>
                                        <a class="btn btn-primary more" href="{{ route('blog-details',['id'=>$blog->id]) }}">
                                            <div>More</div>
                                            <div><i class="ion-ios-arrow-thin-right"></i></div>
                                        </a>
                                    </footer>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
                </div>
                <div class="banner">
                    <a href="#">
                        <img src="{{ asset('/') }}front/images/ads.png" alt="Sample Article">
                    </a>
                </div>
                <div class="line transparent little"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6 trending-tags">
                        <h1 class="title-col">Trending Tags</h1>
                        <div class="body-col">
                            <ol class="tags-list">
                                <li><a href="#">HTML5</a></li>
                                <li><a href="#">CSS3</a></li>
                                <li><a href="#">JavaScript</a></li>
                                <li><a href="#">jQuery</a></li>
                                <li><a href="#">Bootstrap</a></li>
                                <li><a href="#">Responsive</a></li>
                                <li><a href="#">AuteIrure</a></li>
                                <li><a href="#">Voluptate</a></li>
                                <li><a href="#">Veit</a></li>
                                <li><a href="#">Reprehenderit</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h1 class="title-col">
                            Trend News
                            <div class="carousel-nav" id="hot-news-nav">
                                <div class="prev">
                                    <i class="ion-ios-arrow-left"></i>
                                </div>
                                <div class="next">
                                    <i class="ion-ios-arrow-right"></i>
                                </div>
                            </div>
                        </h1>
                        <div class="body-col vertical-slider" data-max="4" data-nav="#hot-news-nav" data-item="article">
                        @foreach($trending_newses as $trend_news)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="{{ route('blog-details',['id'=>$trend_news->id]) }}">
                                            <img src="{{ asset('/') }}admin/blog-image/{{ $trend_news->blog_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('blog-details',['id'=>$trend_news->id]) }}">{{ Str::limit($trend_news->blog_title, 50, '...') }}</a></h1>
                                        <div class="detail">
                                            <div class="category"><a href="{{ route('category-news',['id'=>$hot_news->category_id]) }}">{{ $trend_news->category_name }}</a></div>
                                            <div class="time">{{ date('M-m-Y', strtotime($trend_news->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="line top">
                    <div>Featured News</div>
                </div>
                <div class="row">
                @foreach($featured_newses as $featured_news)
                    <article class="col-md-12 article-list">
                        <div class="inner">
                            <figure>
                                <a href="{{ route('blog-details',['id'=>$featured_news->id]) }}">
                                    <img src="{{ asset('/') }}admin/blog-image/{{ $featured_news->blog_image }}" alt="Sample Article">
                                </a>
                            </figure>
                            <div class="details">
                                <div class="detail">
                                    <div class="category">
                                        <a href="{{ route('category-news',['id'=>$hot_news->category_id]) }}">{{ $featured_news->category_name }}</a>
                                    </div>
                                    <div class="time">{{ date('M-m-Y', strtotime($featured_news->created_at)) }}</div>
                                </div>
                                <h1><a href="{{ route('blog-details',['id'=>$featured_news->id]) }}">{{ $featured_news->blog_title }}</a></h1>
                                <p>
                                {{ Str::limit($featured_news->blog_short_description, 100, '...') }}
                                </p>
                                <footer>
                                    <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>273</div></a>
                                    <a class="btn btn-primary more" href="{{ route('blog-details',['id'=>$featured_news->id]) }}">
                                        <div>More</div>
                                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                                    </a>
                                </footer>
                            </div>
                        </div>
                    </article>
                @endforeach
                </div>
            </div>
            <div class="col-xs-6 col-md-4 sidebar" id="sidebar">
                <div class="sidebar-title for-tablet">Sidebar</div>
                <aside>
                    <div class="aside-body">
                        <div class="featured-author">
                            <div class="featured-author-inner">
                                {{-- <div class="featured-author-cover" style="background-image: url('images/news/img15.jpg');">
                                    <div class="badges">
                                        <div class="badge-item"><i class="ion-star"></i> Featured</div>
                                    </div>
                                    <div class="featured-author-center">
                                        <figure class="featured-author-picture">
                                            <img src="{{ asset('/') }}front/images/img01.jpg" alt="Sample Article">
                                        </figure>
                                        <div class="featured-author-info">
                                            <h2 class="name">John Doe</h2>
                                            <div class="desc">@JohnDoe</div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="featured-author-body">
                                    {{-- <div class="featured-author-count">
                                        <div class="item">
                                            <a href="#">
                                                <div class="name">Posts</div>
                                                <div class="value">208</div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#">
                                                <div class="name">Stars</div>
                                                <div class="value">3,729</div>
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#">
                                                <div class="icon">
                                                    <div>More</div>
                                                    <i class="ion-chevron-right"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div> --}}
                                    <div class="featured-author-quote">
                                    </div>
                                    <div class="block">
                                        <h2 class="block-title">Photos</h2>
                                        <div class="block-body">
                                            <ul class="item-list-round" data-magnific="gallery">
                                                <li><a href="{{ asset('/') }}front/images/news/img06.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img06.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img07.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img07.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img08.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img08.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img09.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img09.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img10.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img10.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img11.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img11.jpg');"></a></li>
                                                <li><a href="{{ asset('/') }}front/images/news/img12.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img12.jpg');"><div class="more">+2</div></a></li>
                                                <li class="hidden"><a href="{{ asset('/') }}front/images/news/img13.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img13.jpg');"></a></li>
                                                <li class="hidden"><a href="{{ asset('/') }}front/images/news/img14.jpg" style="background-image: url('{{ asset('/') }}front/images/news/img14.jpg');"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="featured-author-footer">
                                        <a href="#">See All Authors</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Popular <a href="{{ route('all-news') }}" class="all">See All <i class="ion-ios-arrow-right"></i></a></h1>
                    <div class="aside-body">
                    @foreach($popular_blogs as $popular_blog)
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="single.html">
                                        <img src="{{ asset('/') }}admin/blog-image/{{ $popular_blog->blog_image }}" alt="Sample Article">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{ route('blog-details',['id'=>$popular_blog->id]) }}">{{ $popular_blog->blog_title }}</a></h1>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    </div>
                </aside>
                <aside>
                    <div class="aside-body">
                        <form class="newsletter" action="{{ route('newsletter') }}" method="POST">
                        @csrf
                            <div class="icon">
                                <i class="ion-ios-email-outline"></i>
                                <h1>Newsletter</h1>
                            </div>
                            <div class="input-group">
                                <input type="email" name="email" class="form-control " placeholder="Your mail">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
                                </div>
                            </div>
                            <p>By subscribing you will receive new articles in your email.</p>
                        </form>
                    </div>
                </aside>
                <aside>
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li class="active">
                            <a href="#recomended" aria-controls="recomended" role="tab" data-toggle="tab">
                                <i class="ion-android-star-outline"></i> Recomended
                            </a>
                        </li>
                        <li>
                            <a href="#comments" aria-controls="comments" role="tab" data-toggle="tab">
                                <i class="ion-ios-chatboxes-outline"></i> Comments
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="recomended">
                        @foreach($recomendeds as $recomended)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="single.html">
                                            <img src="{{ asset('/') }}admin/blog-image/{{ $recomended->blog_image }}" alt="Sample Article">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1><a href="{{ route('blog-details',['id'=>$recomended->id]) }}">{{ $recomended->blog_title }}</a></h1>
                                        <div class="detail">
                                            <div class="category"><a href="{{ route('category-news',['id'=>$recomended->category_id]) }}">{{ $recomended->category_name }}</a></div>
                                            <div class="time">{{ date('M-d-Y', strtotime($hot_news->created_at)) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        </div>
                        <div class="tab-pane comments" id="comments">
                            <div class="comment-list sm">
                                <div class="item">
                                    <div class="user">
                                        <figure>
                                            <img src="{{ asset('/') }}front/images/img01.jpg" alt="User Picture">
                                        </figure>
                                        <div class="details">
                                            <h5 class="name">Mark Otto</h5>
                                            <div class="time">24 Hours</div>
                                            <div class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="user">
                                        <figure>
                                            <img src="{{ asset('/') }}front/images/img01.jpg" alt="User Picture">
                                        </figure>
                                        <div class="details">
                                            <h5 class="name">Mark Otto</h5>
                                            <div class="time">24 Hours</div>
                                            <div class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="user">
                                        <figure>
                                            <img src="{{ asset('/') }}front/images/img01.jpg" alt="User Picture">
                                        </figure>
                                        <div class="details">
                                            <h5 class="name">Mark Otto</h5>
                                            <div class="time">24 Hours</div>
                                            <div class="description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Videos
                        <div class="carousel-nav" id="video-list-nav">
                            <div class="prev"><i class="ion-ios-arrow-left"></i></div>
                            <div class="next"><i class="ion-ios-arrow-right"></i></div>
                        </div>
                    </h1>
                    <div class="aside-body">
                        <ul class="video-list" data-youtube='"carousel":true, "nav": "#video-list-nav"'>
                            <li><a data-youtube-id="SBjQ9tuuTJQ" data-action="magnific"></a></li>
                            <li><a data-youtube-id="9cVJr3eQfXc" data-action="magnific"></a></li>
                            <li><a data-youtube-id="DnGdoEa1tPg" data-action="magnific"></a></li>
                        </ul>
                    </div>
                </aside>
                <aside id="sponsored">
                    <h1 class="aside-title">Sponsored</h1>
                    <div class="aside-body">
                        <ul class="sponsored">
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="{{ asset('/') }}front/images/sponsored.png" alt="Sponsored">
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>

<section class="best-of-the-week">
    <div class="container">
        <h1><div class="text">Best Of The Week</div>
            <div class="carousel-nav" id="best-of-the-week-nav">
                <div class="prev">
                    <i class="ion-ios-arrow-left"></i>
                </div>
                <div class="next">
                    <i class="ion-ios-arrow-right"></i>
                </div>
            </div>
        </h1>
        <div class="owl-carousel owl-theme carousel-1">
            @foreach($best_weeks as $best_week)
                <article class="article">
                    <div class="inner">
                        <figure>
                            <a href="{{ route('blog-details',['id'=>$best_week->id]) }}">
                                <img src="{{ asset('/') }}admin/blog-image/{{ $best_week->blog_image }}" alt="Sample Article">
                            </a>
                        </figure>
                        <div class="padding">
                            <div class="detail">
                                    <div class="time">{{ date('M-m-Y', strtotime($trend_news->created_at)) }}</div>
                                    <div class="category"><a href="{{ route('category-news',['id'=>$hot_news->category_id]) }}">{{ $best_week->category_name }}</a></div>
                            </div>
                            <h2><a href="{{ route('blog-details',['id'=>$best_week->id]) }}">{{ Str::limit($best_week->blog_title , 50, '...') }}</a></h2>
                            <p>
                                {{ Str::limit($best_week->blog_short_description , 100, '...') }}
                            </p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>


@endsection
