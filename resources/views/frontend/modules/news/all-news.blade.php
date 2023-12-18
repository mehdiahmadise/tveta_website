@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه اخبار ها</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">اخبار ها</li>
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
                        @foreach ($news as $new)
                        <div class="col-lg-6 col-md-6 col-12 mt-50">
                            <div class="tm-blog tm-scrollanim">
                                <div class="tm-blog-topside">
                                    <div class="tm-blog-thumb">
                                        <img src="{{ URL::asset($new->image) }}" alt="blog image">
                                    </div>
                                </div>
                                <div class="tm-blog-content">
                                    <h6 class="tm-blog-title"><a href="{{ url('single-news'.'/'.$new->slug) }}">{{ $new->title }}</a></h6>
                                    <ul class="tm-blog-meta">
                                        {{-- <li><a href="#"><i class="ion-android-person"></i>{{ $new->user->name }}</a></li> --}}
                                        <li><i class="ion-android-calendar"></i>{{ jdate($new->created_at)->ago() }}</li>
                                    </ul>
                                    <p>{!! Str::limit($new->content, 100, '...') !!}</p>
                                    <a href="{{ url('single-news'.'/'.$new->slug) }}" class="tm-readmore">ادامه مطلب</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--// Blog Single Item -->

                    </div>

                    <div class="tm-pagination mt-50">
                        {{ $news->links('vendor.pagination.custom') }}
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
                                @foreach ($latest_news as $latest_new)
                                    <li>
                                        <a href="blog-details.html" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_new->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="blog-details.html">{{ $latest_new->title }}</a></h6>
                                            <span>{{ jdate($latest_new->created_at)->ago() }}</span>
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