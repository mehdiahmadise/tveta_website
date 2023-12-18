<!-- Header -->
<div class="tm-header tm-header-sticky">

  {{-- <div class="tm-header-toparea">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-8 col-12">
                  <ul class="tm-header-info">
                      <li>دری</li>
                      <li>پشتو</li>
                      <li>عربی</li>
                      <li>انگلیسی</li>
                  </ul>
              </div>
          </div>
      </div>
  </div> --}}

  <div class="tm-header-bottomarea">
    <div class="container">
        <div class="tm-header-inner p-0 m-0">
            <a class="widget-info-logo" href="{{ route('home_page') }}">
                <img src="{{ URL::asset($system_setting->logo) }}"
                style="width:70px;"
                alt="white logo" class="mt-2">
            </a>
            <nav class="tm-header-nav" style="margin-left:20px;">
                <ul>
                    <li class="tm-header-nav-dropdown">
                        <a href="#">
                            <span>درباره ما</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span>معرفی اداره</span>  
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span>چارت تشکیلاتی</span>   
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="tm-header-nav-dropdown"><a href="#">خبر ها و نشرات</a>
                        <ul>
                            <li><a href="{{ route('frontend.all-news') }}">اخبار</a></li>
                            <li><a href="{{ route('frontend.all-important-activities') }}">فعالیت های مهم</a></li>
                            <li><a href="{{ route('frontend.all-institutes') }}">معرفی انستیتوت ها</a></li>
                            <li><a href="{{ route('frontend.all-schools') }}">معرفی لیسه ها</a></li>
                            <li><a href="{{ route('frontend.all-special-teachings') }}">معرفی تعلیمات خاص</a></li>
                            <li><a href="{{ route('frontend.all-inovation') }}">ابتکارات محصلین</a></li>
                            <li><a href="#">عکس ها و ویدیو ها</a></li>
                            <li><a href="#">کانال های نشراتی</a></li>
                        </ul>
                    </li>
                    <li class="tm-header-nav-dropdown"><a href="#">بانک اطلاعاتی</a>
                        <ul>
                            <li><a href="{{ route('frontend.all-agreements') }}">تفاهم نامه ها</a></li>
                            <li><a href="{{ route("frontend.all-achievements") }}">پلان ها و گزارشات</a></li>
                            <li><a href="{{ route('frontend.all-procurement-contracts') }}">تدارکات و مالی</a></li>
                            <li><a href="{{ route("frontend.all-guidelines") }}">رهنمود ها</a></li>
                            <li><a href="{{ route('frontend.all-procedures') }}">طرز العمل</a></li>
                            <li><a href="{{ route('frontend.all-headships') }}">فورم های عرضه خدمات</a></li>
                        </ul>
                    </li>
                    <li class="tm-header-nav-dropdown"><a href="#">فرصت ها</a>
                        <ul>
                            <li><a href="#">کاریابی</a></li>
                            <li><a href="#">داوطلبی</a></li>
                        </ul>
                    </li>
                    <li class="tm-header-nav-dropdown"><a href="#">مراکز آموزشی و رشته ها</a>
                        <ul>
                            <li><a href="{{ route('frontend.institute-list') }}">لیست انستیتوت ها</a></li>
                            <li><a href="{{ route('frontend.school-list') }}">لیست لیسه های مسلکی</a></li>
                            <li><a href="{{ route('frontend.all-special-teaching-list') }}">لیست تعلیمات خاص</a></li>
                            <li><a href="{{ route('frontend.all-majors') }}">لیست رشته های تحصیلی</a></li>
                        </ul>
                    </li> 
                    <li class="tm-header-nav-dropdown"><a href="{{ route('frontend.all-articles') }}">آموزش</a>
                        <ul>
                            <li><a href="{{ route('frontend.all-articles') }}">مقاله ها</a></li>
                        </ul>
                    </li>
                    <li class="tm-header-nav-dropdown"><a href="#">تماس با اداره</a>
                        <ul>
                            <li><a href="#">مراجع اطلاع رسانی</a></li>
                            <li><a href="#">شماره های تماس مسولین اداره</a></li>
                            <li><a href="#">شماره های تماس مسولین ولایتی</a></li>
                            <li><a href="#">مسولین ایمیل های رسمی</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="d-flex">
                <a href="http://takhnik.tveta.gov.af/da/home" target="_blank" class="btn btn-sm btn-info text-white">
                {{-- <img src="{{ asset('logo/takhnik_logo.png') }}" style="width: 40px;" alt=""> --}}
                    سیستم تخنیک و مسلک
                    
                </a>
                
            </div>
            
            <div class="tm-mobilenav"></div>
        </div>
    </div>
</div>

</div>
<!--// Header -->