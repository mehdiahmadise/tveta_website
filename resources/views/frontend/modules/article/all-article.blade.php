@extends('frontend.layouts.master')

@section('styles')
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/blog-style.css') }}">
  <style>
      .img-gallary img {
        transition: 0.7s;
      }
      .img-gallary img:hover {
        transform: scale(1.1);
        box-shadow: 0 32px 75px rgba(68, 77, 136, 0.2)
      }

      .full-img {
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, 0.9);
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1;

      }

      .full-img img {
        width: 90%;
        max-width: 500px;
        margin-top: 90px !important;
      }

      .full-img span {
        position: absolute;
        top: 21%;
        right: 29%;
        font-size: 30px;
        color: #fff;cursor: pointer;
      }

      #outer {
   
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    }
    .video {
      position: relative;
      left: 0;
      top: 0;
      opacity: 1;
    }


  </style>
  <style>
    @keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
} 
  </style>

  <style>

.container-fostrap {
  /* display: table-cell; */
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
} 
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
.card-content {
  padding:15px;
  text-align:right;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.3em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
  </style>
@endsection


@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه مقالات</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">مقالات</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->


<!-- Page Content -->
<main class="page-content">

    <!-- Blogs Area -->
    <div class="tm-section tm-blog-area tm-padding-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-4">
                  <div class="row tm-products-slider-blog">
                    @foreach ($articles as $item)
                      <div class="col-md-4 col-sm-6">
                        <div class="card card-blog">
                          <div class="card-image img-hover-zoom" style="width: 205px; height: 190px;">
                            <a href="{{ url('/single-article'.'/'.$item->slug) }}">
                              <img
                                class="img img-raised"
                                src="{{ URL::asset($item->image) }}"
                                
                              />
                            </a>
                            <div class="ripple-cont"></div>
                          </div>
                          <div class="table">
                            {{-- <h6 class="category text-info">{{ $item->category->name }}</h6> --}}
                            <h6 class="text-dark font-weight-bold">
                              <a class="text-dark" href="{{ url('/single-article'.'/'.$item->slug) }}"
                                style="font-size: 16px;">{{ Str::limit($item->title, 30, '...') }}</a
                              >
                            </h6>
                            <p class="card-description" style="font-size: 14px;">
                              {!! Str::limit($item->content, 100, '...') !!}
                            </p>
                          </div>
                        </div>
                      </div>
                    @endforeach 
                </div>

                    <div class="tm-pagination mt-50">
                      {{ $articles->links('vendor.pagination.custom') }}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widgets widgets-blog">

                        <!-- Single Widget -->
                        <div class="single-widget widget-search">
                            <h6 class="widget-title">جستجو</h6>
                            <form action="#" class="widget-search-form">
                                <input type="text" placeholder="اینجا سرچ کنید...">
                                <button type="submit"><i class="ion-android-search"></i></button>
                            </form>
                        </div>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <div class="single-widget widget-categories">
                            <h6 class="widget-title">دسته بندی</h6>
                            <ul>
                                <li><a href="#">ورزشی</a></li>
                                <li><a href="#">اقتصادی</a></li>
                                <li><a href="#">سیاسی</a></li>
                            </ul>
                        </div>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <div class="single-widget widget-recentpost">
                            <h6 class="widget-title">خبر های اخیر</h6>
                            <ul>
                                @foreach ($latest_articles as $latest_article)
                                    <li>
                                        <a href="blog-details.html" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_article->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('single-article'.'/'.$latest_article->slug) }}">{{ $latest_article->title }}</a></h6>
                                            <span>{{ jdate($latest_article->created_at)->ago() }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!--// Single Widget -->

                        <!-- Popular Tags -->
                        <div class="single-widget widget-tags">
                            <h6 class="widget-title">تگ ها</h6>
                            <ul>
                                <li><a href="#">ورزشی</a></li>
                                <li><a href="#">سیاسی</a></li>
                                <li><a href="#">اقتصادی</a></li>
                                <li><a href="#">جنگی</a></li>
                            </ul>
                        </div>
                        <!--// Popular Tags -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Blogs Area -->
</main>
<!--// Page Content -->
@endsection