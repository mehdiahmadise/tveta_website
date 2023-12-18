@extends('frontend.layouts.master')

@section('styles')
<style>
  .card-big-shadow {
  max-width: 320px;
  position: relative;
}

.coloured-cards .card {
  margin-top: 30px;
}

.card[data-radius="none"] {
  border-radius: 0px;
}
.card {
  border-radius: 15px;
  box-shadow: 0 2px 2px rgba(204, 197, 185, 0.5);
  background-color: #FFFFFF;
  color: #252422;
  margin-bottom: 20px;
  position: relative;
  z-index: 1;
}


.card[data-background="image"] .title, .card[data-background="image"] .stats, .card[data-background="image"] .category, .card[data-background="image"] .description, .card[data-background="image"] .content, .card[data-background="image"] .card-footer, .card[data-background="image"] small, .card[data-background="image"] .content a, .card[data-background="color"] .title, .card[data-background="color"] .stats, .card[data-background="color"] .category, .card[data-background="color"] .description, .card[data-background="color"] .content, .card[data-background="color"] .card-footer, .card[data-background="color"] small, .card[data-background="color"] .content a {
  color: #FFFFFF;
}
.card.card-just-text .content {
  padding: 50px 65px;
  text-align: center;
}
.card .content {
  padding: 20px 20px 10px 20px;
}
.card[data-color="blue"] .category {
  color: #7a9e9f;
}

.card .category, .card .label {
  font-size: 14px;
  margin-bottom: 0px;
}
.card-big-shadow:before {
  background-image: url("http://static.tumblr.com/i21wc39/coTmrkw40/shadow.png");
  background-position: center bottom;
  background-repeat: no-repeat;
  background-size: 100% 100%;
  bottom: -12%;
  content: "";
  display: block;
  left: -12%;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 0;
}
h4, .h4 {
  font-size: 1.5em;
  font-weight: 600;
  line-height: 1.2em;
}
h6, .h6 {
  font-size: 0.9em;
  font-weight: 600;
  text-transform: uppercase;
}
.card .description {
  font-size: 16px;
  color: #66615b;
}
.content-card{
  margin-top:30px;    
}
a:hover, a:focus {
  text-decoration: none;
}

/*======== COLORS ===========*/
.card[data-color="blue"] {
  background: #b8d8d8;
}
.card[data-color="blue"] .description {
  color: #506568 !important;
}

.card[data-color="green"] {
  background: #d5e5a3;
}
.card[data-color="green"] .description {
  color: #60773d !important;
}
.card[data-color="green"] .category {
  color: #92ac56;
}

.card[data-color="yellow"] {
  background: #ffe28c;
}
.card[data-color="yellow"] .description {
  color: #b25825 !important;
}
.card[data-color="yellow"] .category {
  color: #d88715;
}

.card[data-color="brown"] {
  background: #d6c1ab;
}
.card[data-color="brown"] .description {
  color: #75442e !important;
}
.card[data-color="brown"] .category {
  color: #a47e65;
}

.card[data-color="purple"] {
  background: #baa9ba;
}
.card[data-color="purple"] .description {
  color: #3a283d !important;
}
.card[data-color="purple"] .category {
  color: #5a283d;
}

.card[data-color="orange"] {
  background: #ff8f5e;
}
.card[data-color="orange"] .description {
  color: #772510 !important;
}
.card[data-color="orange"] .category {
  color: #e95e37;
}
</style>
@endsection

@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه دستاورد ها</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">دستاورد ها</li>
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
                    @foreach ($headships as $headship)
                      <div class="col-md-6 col-sm-6">
                        <div class="card-big-shadow">
                            <div class="card card-just-text" data-background="color" data-color="brown" data-radius="none" style="border-radius: 15px;">
                                <div class="content">
                                    <h4 class="title"><a href="{{ url('/single-headship'.'/'.$headship->slug) }}">{{ $headship->title }}</a></h4>
                                    <p class="description text-dark">{!! $headship->content !!}</p>
                                </div>
                            </div> <!-- end card -->
                        </div>
                    </div>
                    @endforeach

                </div>

                <div class="tm-pagination mt-50">
                  {{ $headships->links('vendor.pagination.custom') }}
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
                            @foreach ($latest_headships as $latest_headship)
                                <li>
                                    <div class="widget-recentpost-content">
                                        <h6><a href="{{ url('single-guideline'.'/'.$latest_headship->slug) }}">{{ $latest_headship->title }}</a></h6>
                                        <span>{{ jdate($latest_headship->created_at)->ago() }}</span>
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