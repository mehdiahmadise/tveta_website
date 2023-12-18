@extends('frontend.layouts.master')

@section('content')
   <!-- Breadcrumb Area -->
   <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
   data-white-overlay="2">
   <div class="container">
       <div class="tm-breadcrumb">
           <h2 class="text-white">جزییات دستاورد</h2>
           <ul class="text-white">
               <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
               <li class="text-white"><a href="{{ route('frontend.all-achievements') }}" class="text-white">همه دستاورد ها</a></li>
               <li class="text-white" class="text-white">{{ $achievement->subject }}</li>
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
                   <div class="tm-blog blogitem">
                       <div class="tm-blog-topside">
                           <div class="tm-blog-thumb">
                               <img src="{{ URL::asset($achievement->image) }}" alt="blog image">
                           </div>
                       </div>
                       <div class="tm-blog-content">
                           <h6 class="tm-blog-title">{{ $achievement->subject }}</h6>
                           <ul class="tm-blog-meta">
                               {{-- <li><a href="#"><i class="ion-android-person"></i>{{ $news->user->name }}</a> </li> --}}
                               <li><i class="ion-android-calendar"></i>{{ jdate($achievement->created_at)->ago() }}</li>
                               <li><a href="#"><i class="ion-chatbubbles"></i>3 نظر</a></li>
                           </ul>
                           <p>{!! $achievement->content !!}</p>
                       </div>

                   </div>
               </div>
               <div class="col-lg-4">
                   <div class="widgets widgets-blog">

                       <!-- Single Widget -->
                       <div class="single-widget widget-categories">
                           <h6 class="widget-title">دسته بندی</h6>
                           <ul>
                               <li><a href="#">دسته بندی جدید</a></li>
                           </ul>
                       </div>
                       <!--// Single Widget -->

                       <!-- Single Widget -->
                       <div class="single-widget widget-recentpost">
                           <h6 class="widget-title">جدیدترین دستاورد ها</h6>
                           <ul>
                                @foreach ($latest_achievements as $latest_achievement)
                                    <li>
                                        <a href="{{ url('single-achievement'.'/'.$latest_achievement->slug) }}" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_achievement->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('single-achievement'.'/'.$latest_achievement->slug) }}">{{ $latest_achievement->title }}</a></h6>
                                            <span>{{ jdate($latest_achievement->created_at)->ago() }}</span>
                                        </div>
                                    </li>
                                @endforeach 
                           </ul>
                       </div>

                   </div>
               </div>
           </div>
       </div>
   </div>
   <!--// Blogs Area -->

</main>
<!--// Page Content -->
@endsection