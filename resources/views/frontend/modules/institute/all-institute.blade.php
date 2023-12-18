@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه انستیتوت ها</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">انستیتوت ها</li>
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
                <div class="col-lg-8">
                    <div class="row mt-50-reverse">

                        <!-- Blog Single Item -->
                        @foreach ($institutes as $institute)
                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="tm-product text-center tm-scrollanim">
                                
                                  <img src="{{ URL::asset($institute->image) }}" alt="product image" style="height: 200px;">
                                <div class="tm-product-bottomside">
                                    <h6 class="tm-product-title"><a href="{{ url('/single-institute'.'/'.$institute->slug) }}">{{ $institute->name }}</a></h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--// Blog Single Item -->

                    </div>

                    <div class="tm-pagination mt-50">
                        {{ $institutes->links('vendor.pagination.custom') }}
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
                                @foreach ($latest_institutes as $latest_institute)
                                    <li>
                                        <a href="blog-details.html" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_institute->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('single-institute'.'/'.$latest_institute->slug) }}">{{ $latest_institute->name }}</a></h6>
                                            <span>{{ jdate($latest_institute->created_at)->ago() }}</span>
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