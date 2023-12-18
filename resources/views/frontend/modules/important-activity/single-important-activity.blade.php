@extends('frontend.layouts.master')

@section('content')
   <!-- Breadcrumb Area -->
   <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
   data-white-overlay="2">
   <div class="container">
       <div class="tm-breadcrumb">
           <h2 class="text-white">جزییات خبر</h2>
           <ul class="text-white">
               <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
               <li class="text-white"><a href="{{ route('frontend.all-important-activities') }}" class="text-white">همه اخبار</a></li>
               <li class="text-white" class="text-white">{{ $important_activity->title }}</li>
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
                               <img src="{{ URL::asset($important_activity->image) }}" alt="blog image">
                           </div>
                       </div>
                       <div class="tm-blog-content">
                           <h6 class="tm-blog-title">{{ $important_activity->title }}</h6>
                           <ul class="tm-blog-meta">
                               <li><i class="ion-android-calendar"></i>{{ jdate($important_activity->created_at)->ago() }}</li>
                               <li><a href="#"><i class="ion-chatbubbles"></i>3 نظر</a></li>
                           </ul>
                           <p>{!! $important_activity->description !!}</p>
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
                           <h6 class="widget-title">جدیدترین اخبار ها</h6>
                           <ul>
                                @foreach ($latest_important_activities as $latest_important_activity)
                                    <li>
                                        <a href="{{ url('single-important-activity'.'/'.$latest_important_activity->slug) }}" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_important_activity->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('single-important-activity'.'/'.$latest_important_activity->slug) }}">{{ $latest_important_activity->title }}</a></h6>
                                            <span>{{ jdate($latest_important_activity->created_at)->ago() }}</span>
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