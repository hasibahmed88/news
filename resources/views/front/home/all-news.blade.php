@extends('front.master')

@section('title')
News
@endsection

@section('body')

<section class="category">
    <div class="container">
      <div class="row">
        <div class="col-md-8 text-left">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb">
                <li><a href="{{ route('/') }}">Home</a></li>
                <li class="active">News</li>
              </ol>
            </div>
          </div>

          <div class="line"></div>
          <div class="row">
            @foreach($blogs as $blog)
                <article class="col-md-12 article-list">
                <div class="inner">
                    <figure>
                        <a href="{{ route('blog-details',['id'=>$blog->id]) }}">
                        <img src="{{ asset('/') }}admin/blog-image/{{ $blog->blog_image }}">
                    </a>
                    </figure>
                    <div class="details">
                    <div class="detail">
                        <div class="category">
                        <a href="{{ route('category-news',['id'=>$blog->category_id]) }}">{{ $blog->category_name }} </a>
                        </div>
                        <div class="time">{{ date('M-d-y',strToTime($blog->created_at)) }}</div>
                    </div>
                    <h1><a href="{{ route('blog-details',['id'=>$blog->id]) }}">{{ $blog->blog_title }}</a></h1>
                    <p>
                        {{ $blog->blog_short_description }}
                    </p>
                    <footer>
                        <a href="#" class="love"><i class="ion-android-favorite-outline"></i> <div>237</div></a>
                        <a class="btn btn-primary more" href="{{ route('blog-details',['id'=>$blog->id]) }}">
                        <div>Read More</div>
                        <div><i class="ion-ios-arrow-thin-right"></i></div>
                        </a>
                    </footer>
                    </div>
                </div>
                </article>
            @endforeach

            <div class="col-md-12 text-center">
                <span>{{ $blogs->links() }}</span>

                {{-- <ul class="pagination">
                <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#">97</a></li>
                <li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
              </ul> --}}
              {{-- <div class="pagination-help-text">
                  Showing 8 results of 776 &mdash; Page 1
              </div> --}}
            </div>
          </div>
        </div>
        <div class="col-md-4 sidebar">
          <aside>
            <div class="aside-body">
              <figure class="ads">
                  <a href="single.html">
                    <img src="{{ asset('/') }}front/images/ad.png">
                  </a>
                <figcaption>Advertisement</figcaption>
              </figure>
            </div>
          </aside>
          <aside>
            <h1 class="aside-title">Recent Post</h1>
            <div class="aside-body">
              <article class="article-fw">
                <div class="inner">
                  <figure>
                      <a href="single.html">
                        <img src="{{asset('/') }}admin/blog-image/{{ $blog->blog_image }}">
                      </a>
                  </figure>
                  <div class="details">
                    <h1><a href="single.html">{{ $recent_single->blog_title }}</a></h1>
                    <p>
                      {{ Str::limit( $recent_single->blog_short_description, 120, '...') }}
                    </p>
                    <div class="detail">
                      <div class="time">{{ date('M-d-y', strToTime($recent_single->created_at)) }}</div>
                      <div class="category"><a href="category.html">{{ $recent_single->category_name }}</a></div>
                    </div>
                  </div>
                </div>
              </article>
              <div class="line"></div>
            @foreach($recent_newses as $recent_news)
              <article class="article-mini">
                <div class="inner">
                <figure>
                    <a href="{{ route('blog-details',['id'=>$recent_news->id]) }}">
                      <img src="{{ asset('/') }}admin/blog-image/{{ $recent_news->blog_image }}">
                  </a>
                </figure>
                <div class="padding">
                  <h1><a href="{{ route('blog-details',['id'=>$recent_news->id]) }}">{{ Str::limit($recent_news->blog_title , 50, '...') }}</a></h1>
                  <div class="detail">
                    <div class="category"><a href="{{ route('category-news',['id'=>$recent_news->category_id]) }}">{{ $recent_news->category_name }}</a></div>
                    <div class="time">{{ date('M-d-y',strToTime($recent_news->created_at)) }}</div>
                  </div>
                </div>
                </div>
              </article>
            @endforeach
            </div>
          </aside>
          <div class="line"></div>
          <aside>
            <div class="aside-body">
              {{-- <form class="newsletter">
                <div class="icon">
                  <i class="ion-ios-email-outline"></i>
                  <h1>Newsletter</h1>
                </div>
                <div class="input-group">
                  <input type="email" class="form-control email" placeholder="Your mail">
                  <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="ion-paper-airplane"></i></button>
                  </div>
                </div>
                <p>By subscribing you will receive new articles in your email.</p>
              </form> --}}
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
      </div>
    </div>
  </section>

@endsection
