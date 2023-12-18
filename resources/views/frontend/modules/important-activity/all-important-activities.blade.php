@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه فعالیت های مهم</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">فعالیت های مهم</li>
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
                    <div class="row">

                        <!-- Blog Single Item -->
                        @foreach ($important_activities as $important_activity)
                            <div class="col-lg-4">
                                <div class="tm-blog tm-scrollanim card">
                                    <div class="tm-blog-topside">
                                        <div class="tm-blog-thumb">
                                            <img src="{{ URL::asset($important_activity->image) }}" alt="blog image">
                                        </div>
                                    </div>
                                    <div class="tm-blog-content p-2" >
                                        <h6 class="tm-blog-title"><a href="{{ url('/single-important-activity'.'/'.$important_activity->slug) }}">{{ $important_activity->title }}</a></h6>
                                        <p>{!! Str::limit($important_activity->description, 100, '...') !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!--// Blog Single Item -->

                    </div>

                    <div class="tm-pagination mt-50">
                        {{ $important_activities->links('vendor.pagination.custom') }}
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
                            <h6 class="widget-title">فعالیت های مهم اخیر</h6>
                            <ul>
                                @foreach ($latest_important_activities as $latest_important_activity)
                                    <li>
                                        <a href="{{ url('/single-important-activity'.'/'.$important_activity->slug) }}" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_important_activity->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('/single-important-activity'.'/'.$important_activity->slug) }}">{{ $latest_important_activity->title }}</a></h6>
                                            <span>{{ jdate($latest_important_activity->created_at)->ago() }}</span>
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