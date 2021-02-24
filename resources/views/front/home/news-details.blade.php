@extends('front.master')

@section('title')
Blog Details
@endsection

@section('body')

<section class="single" style="margin-top:200px">
    <div class="container">
        <div class="row">
            <div class="col-md-4 sidebar" id="sidebar">
                <aside>
                    <div class="aside-body">
                        <figure class="ads">
                            <img src="{{ asset('/') }}front/images/ad.png">
                            <figcaption>Advertisement</figcaption>
                        </figure>
                    </div>
                </aside>
                <aside>
                    <h1 class="aside-title">Featured Post</h1>
                    <div class="aside-body">
                    @foreach($featured_newses as $featured_news)
                        <article class="article-mini">
                            <div class="inner">
                                <figure>
                                    <a href="{{ route('blog-details',['id'=>$featured_news->id]) }}">
                                        <img src="{{ asset('/') }}admin/blog-image/{{ $featured_news->blog_image }}">
                                    </a>
                                </figure>
                                <div class="padding">
                                    <h1><a href="{{ route('blog-details',['id'=>$featured_news->id]) }}">{{ Str::limit($featured_news->blog_title, 60, '...') }}</a></h1>
                                    <div class="detail">
                                        <div class="category"><a href="{{ route('category-news',['id'=>$featured_news->category_id]) }}">{{ $featured_news->category_name }}</a></div>
                                        <div class="time"><p>Posted on <strong>{{ date('M-m-Y', strtotime($blog->created_at)) }}</p></div>
                                    </div>
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
            </div>
            <div class="col-md-8">
                <h5 class="text-success">{{ Session::get('message') }}</h5>
                <ol class="breadcrumb">
                  <li><a href="{{ route('/') }}">Home</a></li>
                  <li class="active">Film</li>
                </ol>
                <article class="article main-article">
                    <header>
                        <h3> {{ $blog->blog_title }} </h3>
                        <ul class="details">
                            <li>Posted on <strong>{{ date('M-m-Y', strtotime($blog->created_at)) }}</strong></li>
                            <li><a href="{{ route('category-news',['id'=>$blog->category_id]) }}">{{ $blog->category_name }}</a></li>
                            <li>By <a href="#">John Doe</a></li>
                        </ul>
                    </header>
                    <div class="main">
                        <p>
                            {{ $blog->blog_short_description }}
                        </p>
                        <div class="featured">
                            <figure>
                                <img src="{{ asset('/') }}admin/blog-image/{{ $blog->blog_image }}">
                                <figcaption>Image by pexels.com</figcaption>
                            </figure>
                        </div>

                        <p>
                            {!! $blog->blog_long_description !!}
                        </p>

                    </div>
                    <footer>
                        <div class="col">
                            <ul class="tags">
                                <li><a href="#">Free Themes</a></li>
                                <li><a href="#">Bootstrap 3</a></li>
                                <li><a href="#">Responsive Web Design</a></li>
                                <li><a href="#">HTML5</a></li>
                                <li><a href="#">CSS3</a></li>
                                <li><a href="#">Web Design</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>1220</div></a>
                        </div>
                    </footer>
                </article>
                <div class="sharing">
                <div class="title"><i class="ion-android-share-alt"></i> Sharing this post</div>
                    {{-- <ul class="social">
                        <li>
                            <a href="#" class="facebook">
                                <i class="ion-social-facebook"></i> Facebook
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="ion-social-twitter"></i> Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="googleplus">
                                <i class="ion-social-googleplus"></i> Google+
                            </a>
                        </li>
                        <li>
                            <a href="#" class="linkedin">
                                <i class="ion-social-linkedin"></i> Linkedin
                            </a>
                        </li>
                        <li>
                            <a href="#" class="skype">
                                <i class="ion-ios-email-outline"></i> Email
                            </a>
                        </li>
                        <li class="count">
                            20
                            <div>Shares</div>
                        </li>
                    </ul> --}}

                    <div id="social-links">
                        <ul class="nav">
                            <li class=""><a target="blank" href="https://www.facebook.com/sharer/sharer.php?" class="social-button " id=""><i class="fab fa-facebook-f"></i></a></li>
                            <li class=""><a target="blank" href="https://twitter.com/intent/tweet?text=my share text&amp;url=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-twitter"></i></a></li>
                            <li class=""><a target="blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://jorenvanhocht.be&amp;title=my share text&amp;summary=dit is de linkedin summary" class="social-button " id=""><i class="fab fa-linkedin"></i></a></li>
                            <li class=""><a target="blank" href="https://wa.me/?text=http://jorenvanhocht.be" class="social-button " id=""><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                {{-- <div class="addthis_inline_share_toolbox"></div> --}}


                </div>
                <div class="line">
                    <div>Author</div>
                </div>
                <div class="author">
                    <figure>
                        <img src="{{ asset('/') }}front/images/img01.jpg">
                    </figure>
                    <div class="details">
                        <div class="job">Web Developer</div>
                        <h5 class="name">John Doe</h5>
                        <p>Nulla sagittis rhoncus nisi, vel gravida ante. Nunc lobortis condimentum elit, quis porta ipsum rhoncus vitae. Curabitur magna leo, porta vel fringilla gravida, consectetur in libero. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                        {{-- <ul class="social trp sm">
                            <li>
                                <a href="#" class="facebook">
                                    <svg><rect/></svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg><rect/></svg>
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="youtube">
                                    <svg><rect/></svg>
                                    <i class="ion-social-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="googleplus">
                                    <svg><rect/></svg>
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul> --}}
                    </div>
                </div>

{{--

    Comment show korte hobe.

--}}



                <div class="line thin"></div>
                <div class="comments">
                    <h5 class="title">All Comments</h5>
                    <div class="comment-list">
                        <div class="item">
                        @foreach($comments as $comment)
                            <div class="user">
                                <figure>
                                    <img src="{{ asset('/') }}front/images/img01.jpg">
                                </figure>
                                <div class="details">
                                    <h6 class="name">{{ $comment->first_name.' '.$comment->last_name }}</h6>
                                    <div class="time"> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }} </div>
                                    <div class="description">
                                        {{ $comment->comment }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>

                @if($visitor = Session::get('visitorId'))

                    <form class="row" action="{{ route('visitor-comment') }}" method="POST">
                        @csrf

                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <input type="hidden" name="visitor_id" value="{{ $visitor }}">
                        <div class="col-md-12">
                            <h5 class="title">Leave Your Comment</h5>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="comment">Comment <span class="required"></span></label>
                            <textarea class="form-control" name="comment" placeholder="Write your comment ..."></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit-btn" class="btn btn-primary" value="Comment">
                        </div>
                    </form>
                @else
                    <div class="comment-list">
                        <div class="item">
                            <p>
                                You cannot comment here without login or register.If have an account <a href="{{ route('visitor-login') }}">&nbsp; Login here &nbsp;</a> or <a href="{{ route('visitor-register') }}">&nbsp; Register here &nbsp;</a>
                            </p>
                        </div>
                    </div>
                @endif
                </div>


                <div class="line"><div>You May Also Like</div></div>
                <div class="row">
                    @foreach($random_blogs as $random)
                    <article class="article related col-md-6 col-sm-6 col-xs-12">
                        <div class="inner">
                            <figure>
                                <a href="#">
                                    <img src="{{ asset('/') }}admin/blog-image/{{ $random->blog_image }}">
                                </a>
                            </figure>
                            <div class="padding">
                                <h2><a href="{{ route('blog-details',['id'=>$random->id]) }}">{{ $random->blog_title }}</a></h2>
                                <div class="detail">
                                    <div class="category"><a href="{{ route('category-news',['id'=>$random->category_id]) }}">{{ $random->category_name }}</a></div>
                                    <div class="time">{{ date('M-m-Y', strtotime($blog->created_at)) }}</div>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
                </div>


            </div>
        </div>
    </div>
</section>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
{{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ee5ec2726c8b8f2"></script> --}}

@endsection
