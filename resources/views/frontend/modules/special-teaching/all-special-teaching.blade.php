@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه تعلیمات خاص</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">تعلیمات خاص</li>
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
                        @foreach ($special_teachings as $special_teaching)
                        <div class="col-lg-6 col-md-6 col-12 mt-50">
                            <div class="tm-blog tm-scrollanim">
                                <div class="tm-blog-topside">
                                    <div class="tm-blog-thumb">
                                        <img src="{{ URL::asset($special_teaching->image) }}" alt="blog image">
                                    </div>
                                </div>
                                <div class="tm-blog-content">
                                    <h6 class="tm-blog-title"><a href="{{ url('single-special-teaching'.'/'.$special_teaching->slug) }}">{{ $special_teaching->name }}</a></h6>
                                    <ul class="tm-blog-meta">
                                        {{-- <li><a href="#"><i class="ion-android-person"></i>{{ $special_teaching->user->name }}</a></li> --}}
                                        <li><i class="ion-android-calendar"></i>{{ jdate($special_teaching->created_at)->ago() }}</li>
                                    </ul>
                                    <p>{!! Str::limit($special_teaching->content, 100, '...') !!}</p>
                                    <a href="{{ url('single-special-teaching'.'/'.$special_teaching->slug) }}" class="tm-readmore">ادامه مطلب</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!--// Blog Single Item -->

                    </div>

                    <div class="tm-pagination mt-50">
                        {{ $special_teachings->links('vendor.pagination.custom') }}
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
                                @foreach ($latest_special_teachings as $latest_special_teaching)
                                    <li>
                                        <a href="blog-details.html" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_special_teaching->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="blog-details.html">{{ $latest_special_teaching->name }}</a></h6>
                                            <span>{{ jdate($latest_special_teaching->created_at)->ago() }}</span>
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