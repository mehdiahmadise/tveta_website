@extends('frontend.layouts.master')

@section('styles')
<style>
.container-fostrap {
  display: table-cell;
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
            <h2 class="text-white">همه تفاهم نامه ها</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">تفاهم نامه ها</li>
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
                    <div class="row mt-50-reverse">
                        <!-- Blog Single Item -->
                        @foreach ($agreements as $agreement)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                          <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                              <img src="{{ URL::asset($agreement->image) }}" class="img-fluid" />
                              <a href="{{ url('/single-agreement'.'/'.$agreement->slug) }}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                              </a>
                            </div>
                            <div class="card-body">
                              <h5 class="card-title font-weight-bold"><a>{{ $agreement->subject }}</a></h5>
                              <p class="card-text">
                                {!! Str::limit($agreement->content, 100, '...') !!}
                              </p>
                              <hr class="my-4"/>
                              <a href="{{ url('/single-agreement'.'/'.$agreement->slug) }}" class="btn btn-sm btn-info p-md-1 mb-0 text-white">اطلاعات بیشتر</a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <!--// Blog Single Item -->

                    </div>

                    <div class="tm-pagination mt-50">
                      {{ $agreements->links('vendor.pagination.custom') }}
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
                                @foreach ($latest_agreements as $latest_agreement)
                                    <li>
                                        <a href="blog-details.html" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_agreement->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('single-agreement'.'/'.$latest_agreement->slug) }}">{{ $latest_agreement->subject }}</a></h6>
                                            <span>{{ jdate($latest_agreement->created_at)->ago() }}</span>
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