@extends('frontend.layouts.master')

@section('content')
   <!-- Breadcrumb Area -->
   <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
   data-white-overlay="2">
   <div class="container">
       <div class="tm-breadcrumb">
           <h2 class="text-white">جزییات تعلیمات خاص</h2>
           <ul class="text-white">
               <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
               <li class="text-white"><a href="{{ route('frontend.all-special-teachings') }}" class="text-white">همه تعلیمات خاص</a></li>
               <li class="text-white" class="text-white">{{ $special_teaching->name }}</li>
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
                               <img src="{{ URL::asset($special_teaching->image) }}" alt="blog image">
                           </div>
                       </div>
                       <div class="tm-blog-content">
                           <h6 class="tm-blog-title">{{ $special_teaching->name }}</h6>
                           <ul class="tm-blog-meta">
                               {{-- <li><a href="#"><i class="ion-android-person"></i>{{ $special_teaching->user->name }}</a> </li> --}}
                               <li><i class="ion-android-calendar"></i>{{ jdate($special_teaching->created_at)->ago() }}</li>
                               <li><a href="#"><i class="ion-chatbubbles"></i>3 نظر</a></li>
                           </ul>
                           <p>{!! $special_teaching->content !!}</p>
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
                           <h6 class="widget-title">جدیدترین تعلیمات خاص</h6>
                           <ul>
                                @foreach ($latest_special_teachings as $latest_special_teaching)
                                    <li>
                                        <a href="{{ url('single-special-teaching'.'/'.$latest_special_teaching->slug) }}" class="widget-recentpost-image">
                                            <img src="{{ URL::asset($latest_special_teaching->image) }}"
                                                alt="blog thumbnail">
                                        </a>
                                        <div class="widget-recentpost-content">
                                            <h6><a href="{{ url('single-special-teaching'.'/'.$latest_special_teaching->slug) }}">{{ $latest_special_teaching->name }}</a></h6>
                                            <span>{{ jdate($latest_special_teaching->created_at)->ago() }}</span>
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