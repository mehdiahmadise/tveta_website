@extends('frontend.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/blog-style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/home.css') }}">
@endsection

@section('content')
  <!-- Page Content -->
  @include('frontend.includes.slider')

  <main class="page-content" style=" background: url('{{ asset('image/images/background.svg') }}') no-repeat; background-size: cover;">


    {{-- <div id="tm-news-area" class="tm-section tm-blog-area tm-padding-section-bottom">
      <div class="container">
        <h3 class="pb-3 mb-4 border-bottom">
          پیام رهبری
        </h3>
        <article class="postcard light blue">
          <a class="postcard__img_link" href="#">
            <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Image Title" />
          </a>
          <div class="postcard__text t-dark">
            <h1 class="postcard__title blue"><a href="#">Podcast Title</a></h1>
            <div class="postcard__bar"></div>
            <div class="postcard__preview-txt">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, fugiat asperiores inventore beatae accusamus odit minima enim, commodi quia, doloribus eius! Ducimus nemo accusantium maiores velit corrupti tempora reiciendis molestiae repellat vero. Eveniet ipsam adipisci illo iusto quibusdam, sunt neque nulla unde ipsum dolores nobis enim quidem excepturi, illum quos!</div>
            
          </div>
        </article>
      </div>
    </div> --}}


    <!-- About Area -->
    <section id="tm-about-area" class="tm-section tm-about-area tm-padding-section-bottom mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12 order-2 order-lg-1">
                    <div class="tm-about-content tm-scrollanim">
                        <h6>درباره اداره تعلیمات تخنیکی</h6>
                        <h3>{{ $aboutus->title }}</h3>
                        <p>{!! $aboutus->content !!}</p>
                        
                        <a href="#" class="tm-button">معلومات بیشتر</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-12 order-1 order-lg-2">
                    <div class="tm-about-image tm-scrollanim">
                        <img src="{{ URL::asset('image/images/'.$aboutus->image) }}" alt="about image" style="width: 561px; height: 499px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--// About Area -->

    @if (!$important_activities->isEmpty())
    <!-- Latest Blogs Area -->
    <div id="tm-news-area" class="tm-section tm-blog-area tm-padding-section-bottom bg-pattern-transparent">
      <div class="container">
          <h3 class="pb-3 mb-4 border-bottom">
            فعالیت های مهم
         </h3>
          <div class="row">
              <!-- Blog Single Item -->
              @foreach ($important_activities as $important_activity)
              <div class="col-lg-3">
                <div class="tm-blog tm-scrollanim card">
                    <div class="tm-blog-topside">
                        <div class="tm-blog-thumb">
                            <img src="{{ URL::asset($important_activity->image) }}" alt="blog image">
                        </div>
                    </div>
                    <div class="tm-blog-content p-2" >
                        <h6 class="text-dark font-weight-bold">
                          <a class="text-dark" href="{{ url('/single-important-activity'.'/'.$important_activity->slug) }}">{{ $important_activity->title }}</a>
                        </h6>
                        <p>{!! Str::limit($important_activity->description, 100, '...') !!}</p>
                    </div>
                </div>
            </div>
              @endforeach
              <!--// Blog Single Item -->
          </div>
      </div>
    </div>
    <!--// Latest Blogs Area -->
    @endif

  <div class="container">
    <h3 class="pb-3 mb-4 border-bottom">
       فورم های عرضه خدمات
    </h3>
    <div class="row">
        @foreach ($headships as $headship)
          <div class="col-md-4 col-sm-6">
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
  </div>
  

  <div id="tm-news-area" class="tm-section tm-blog-area tm-padding-section-bottom mt-5">
    <div class="container">
      <h3 class="pb-3 mb-4 border-bottom">
        جدیدترین مقالات
     </h3>
        <div class="row tm-products-slider-blog">
            @foreach ($articles as $item)
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-blog">
                  <div class="card-image img-hover-zoom" style="width: 236px; height: 190px;">
                    <a href="{{ url('/single-article'.'/'.$item->slug) }}">
                      <img
                        class="img img-raised"
                        src="{{ URL::asset($item->image) }}"
                        
                      />
                    </a>
                    <div class="ripple-cont"></div>
                  </div>
                  <div class="table">
                    {{-- <h6 class="category text-info">{{ $item->category->name }}</h6> --}}
                    <h6 class="text-dark font-weight-bold">
                      <a class="text-dark" href="{{ url('/single-article'.'/'.$item->slug) }}"
                        style="font-size: 16px;">{{ Str::limit($item->title, 30, '...') }}</a
                      >
                    </h6>
                    <p class="card-description" style="font-size: 14px;">
                      {!! Str::limit($item->content, 100, '...') !!}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach 
        </div>
    </div>
  </div>

    {{-- gallary --}}
    @if (!$gallaries->isEmpty())
      <section class="tm-section tm-about-area tm-padding-section-bottom mt-5">
        <div class="container">
        <h3 class="pb-3 mb-4 border-bottom">
          گالری تصاویر
       </h3>
          @foreach ($gallaries as $gallary)
          <div class="row p-0 m-0">
            <div class="{{ $gallary->image_size1 }} pb-3 pl-2 img-gallary">
              <img src="{{ URL::asset('uploads/images/'.$gallary->image1) }}" class="w-100 h-100" alt="">
            </div>
            <div class="{{ $gallary->image_size2 }} pb-3 pl-2 img-gallary">
              <img src="{{ URL::asset('uploads/images/'.$gallary->image2) }}" class="w-100 h-100" alt="">
            </div>
            <div class="{{ $gallary->image_size3 }} pb-3 pl-2 img-gallary">
              <img src="{{ URL::asset('uploads/images/'.$gallary->image3) }}" class="w-100 h-100" alt="">
            </div>
          </div>
          @endforeach
        </div>
      </section>
    @endif
  
    <div id="tm-news-area" class="tm-section tm-blog-area tm-padding-section-bottom">
      <div class="container">
        
        <h3 class="pb-3 mb-4 border-bottom">
          جدیدترین اخبار
       </h3>
          <div class="row tm-products-slider-blog">
              @foreach ($news as $item)
                <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="card card-blog">
                    <div class="card-image img-hover-zoom" style="width: 236px; height: 190px;">
                      <a href="{{ url('/single-news'.'/'.$item->slug) }}">
                        <img
                          class="img img-raised"
                          src="{{ URL::asset($item->image) }}"
                        />
                      </a>
                      <div class="ripple-cont"></div>
                    </div>
                    <div class="table">
                      {{-- <h6 class="category text-info">{{ $item->category->name }}</h6> --}}
                      <h6 class="text-dark font-weight-bold">
                        <a class="text-dark" href="{{ url('/single-news'.'/'.$item->slug) }}"
                          style="font-size: 16px;">{{ Str::limit($item->title, 50, '...') }}</a
                        >
                      </h6>
                      <p class="card-description" style="font-size: 14px;">
                        {!! Str::limit($item->content, 150, '...') !!}
                      </p>
                    </div>
                  </div>
                </div>
                @endforeach 
          </div>
      </div>
    </div>

    <div class="tm-section tm-products-area tm-padding-section bg-white">
      <div class="container">
        
      <h3 class="pb-3 mb-4 border-bottom">
        لیست تفاهم نامه ها
     </h3>
        <div class="row">
          @foreach ($agreements as $agreement)
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                  <img src="{{ URL::asset($agreement->image) }}" class="img-fluid" />
                  <a href="{{ url('/single-agreement'.'/'.$agreement->slug) }}">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="text-dark font-weight-bold"><a class="text-dark" href="{{ url('/single-agreement'.'/'.$agreement->slug) }}">{{ $agreement->subject }}</a></h6>
                  <p class="card-text">
                    {!! Str::limit($agreement->content, 100, '...') !!}
                  </p>
                  <hr class="my-4" />
                  <a href="{{ url('/single-agreement'.'/'.$agreement->slug) }}" class="btn btn-sm btn-info p-md-1 mb-0 text-white">اطلاعات بیشتر</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>

      <!-- Products Area -->
      <div class="tm-section tm-products-area tm-padding-section bg-white">
        <div class="container">
            
            <h3 class="pb-3 mb-4 border-bottom">
              لیست انستیتوت ها
           </h3>
            <div class="row tm-products-slider">

                @foreach ($institutes as $institute)
                    <!-- Single Product -->
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <div class="tm-product text-center tm-scrollanim">
                      
                        <img src="{{ URL::asset($institute->image) }}" alt="product image" style="height: 200px;">
                      <div class="tm-product-bottomside">
                          <h6 class="text-dark font-weight-bold"><a class="text-dark" href="{{ url('/single-institute'.'/'.$institute->slug) }}">{{ $institute->name }}</a></h6>
                      </div>
                  </div>
              </div>
              <!--// Single Product -->
                @endforeach
            </div>
        </div>
      </div>
    <!--// Products Area -->

    <!-- Products Area -->
    <div class="tm-section tm-products-area pb-5 bg-white">
      <div class="container">
          <h3 class="pb-3 mb-4 border-bottom">
            لیست لیسه ها 
         </h3>
          <div class="row tm-products-slider">

              @foreach ($schools as $school)
                  <!-- Single Product -->
              <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="tm-product text-center tm-scrollanim">
                    
                      <img src="{{ URL::asset($school->image) }}" alt="product image" style="height: 200px;">
                    <div class="tm-product-bottomside">
                        <h6 class="text-dark font-weight-bold"><a class="text-dark" href="{{ url('/single-school'.'/'.$school->slug) }}">{{ $school->name }}</a></h6>
                    </div>
                </div>
            </div>
            <!--// Single Product -->
              @endforeach
          </div>
      </div>
    </div>
  <!--// Products Area -->

  <div id="tm-news-area" class="tm-section tm-blog-area tm-padding-section-bottom">
    <div class="container">
      <h3 class="pb-3 mb-4 border-bottom">
        لیست تعلیمات خاص 
     </h3>
        <div class="row tm-products-slider-blog">
            @foreach ($special_teachings as $special_teaching)
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-blog">
                  <div class="card-image img-hover-zoom" style="width: 236px; height: 190px;">
                    <a href="{{ url('/single-special-teaching'.'/'.$special_teaching->slug) }}">
                      <img
                        class="img img-raised"
                        src="{{ URL::asset($special_teaching->image) }}"
                      />
                    </a>
                    <div class="ripple-cont"></div>
                  </div>
                  <div class="table">
                    {{-- <h6 class="category text-info">{{ $item->category->name }}</h6> --}}
                    <h6 class="text-dark font-weight-bold">
                      <a class="text-dark" href="{{ url('/single-special-teaching'.'/'.$special_teaching->slug) }}"
                         style="font-size: 16px;">{{ Str::limit($special_teaching->name, 50, '...') }}</a
                      >
                    </h6>
                    <p class="card-description" style="font-size: 14px;">
                      {!! Str::limit($special_teaching->content, 150, '...') !!}
                    </p>
                  </div>
                </div>
              </div>
              @endforeach 
        </div>
    </div>
  </div>

<!-- Blogs Area -->
<div class="tm-section tm-blog-area tm-padding-section bg-white">
    <div class="container">
      <h3 class="pb-3 mb-4 border-bottom">
         تدارکات و مالی
      </h3>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Blog Single Item -->
                    @foreach ($procurement_contracts as $procurement_contract)
                      <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="card">
                          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ URL::asset($procurement_contract->image) }}" class="img-fluid" />
                            <a href="{{ url('/single-procurement_contract'.'/'.$procurement_contract->slug) }}">
                              <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                          </div>
                          <div class="card-body">
                            <h6 class="text-dark font-weight-bold"><a class="text-dark" href="{{ url('/single-procurement-contract'.'/'.$procurement_contract->slug) }}">{{ $procurement_contract->subject }}</a></h6>
                            <p class="card-text">
                              {!! Str::limit($procurement_contract->content, 100, '...') !!}
                            </p>
                            <hr class="my-4"/>
                            <a href="{{ url('/single-procurement-contract'.'/'.$procurement_contract->slug) }}" class="btn btn-sm btn-info p-md-1 mb-0 text-white">اطلاعات بیشتر</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    <!--// Blog Single Item -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--// Blogs Area -->


<div class="container">
  <h3 class="pb-3 mb-4 border-bottom">
     رهنمود ها
  </h3>
  <div class="row">
     @foreach ($guidelines as $guideline)
      <div class="col-md-3">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
          <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{ URL::asset($guideline->image) }}" style="objtct-fit:cover">
          <div class="card-body d-flex flex-column align-items-start">
              {{-- <strong class="d-inline-block mb-2 text-success">Health</strong> --}}
              <h6 class="text-dark font-weight-bold">
                <a class="text-dark font-weight-bold mb-2" href="{{ url('/single-guideline'.'/'.$guideline->slug) }}">{{ $guideline->subject }}</a>
              </h6>
              {{-- <div class="mb-1 text-muted small">Nov 11</div> --}}
              <p class="card-text mb-auto">{!! Str::limit($guideline->content, 70, '...') !!}</p>
              <hr class="my-4"/>
              <a class="btn btn-outline-success btn-sm" href="{{ url('/single-guideline'.'/'.$guideline->slug) }}">ادامه مطلب</a>
          </div>
        </div>
      </div>
     @endforeach
  </div>
</div>

<div class="container">
  <h3 class="pb-3 mb-4 border-bottom">
     طرز العمل ها 
  </h3>
  <div class="row">
     @foreach ($procedures as $procedure)
      <div class="col-md-3">
        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
          <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src="{{ URL::asset($procedure->image) }}" style="objtct-fit:cover">
          <div class="card-body d-flex flex-column align-items-start">
              {{-- <strong class="d-inline-block mb-2 text-success">Health</strong> --}}
              <h6 class="text-dark font-weight-bold">
                <a class="text-dark" href="{{ url('/single-procedure'.'/'.$procedure->slug) }}">{{ $procedure->subject }}</a>
              </h6>
              {{-- <div class="mb-1 text-muted small">Nov 11</div> --}}
              <p class="card-text mb-auto">{!! Str::limit($procedure->content, 70, '...') !!}</p>
              <hr class="my-4"/>
              <a class="btn btn-outline-success btn-sm" href="{{ url('/single-procedure'.'/'.$procedure->slug) }}">ادامه مطلب</a>
          </div>
        </div>
      </div>
     @endforeach
  </div>
</div>

   <!-- Contact Area -->
  <div class="tm-contact-area tm-section tm-padding-section" style="background-color: rgba(190, 210, 233, 0.4)">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="tm-contact">
                <h2>رسیدگی به مشکلات</h2>
                <form action="{{ route('send.email') }}"
                            class="tm-contact-forminner tm-form" method="POST">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <div class="tm-form-inner">
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-name">نام</label>
                                    <input type="text" id="contact-form-name" placeholder="لطفا نام خود را وارد کنید"
                                        name="name" style="background-color: whitesmoke">
                                        @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                        
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-email">ایمیل آدرس</label>
                                    <input type="email" id="contact-form-email"
                                        placeholder="لطفا ایمیل خود را وارد کنید" name="email" style="background-color: whitesmoke">
                                        @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-subject">موضوع</label>
                                    <input type="text" id="contact-form-subject" placeholder="موضوع خود را وارد کنید"
                                        name="subject" style="background-color: whitesmoke">
                                        @error('subject')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                                <div class="tm-form-field tm-form-fieldhalf">
                                    <label for="contact-form-subject">شماره تماس</label>
                                    <input type="text" id="contact-form-subject" placeholder="شماره تما خود را وارد کنید"
                                        name="phone_number" style="background-color: whitesmoke">
                                        @error('phone_number')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                                <div class="tm-form-field">
                                    <label for="contact-form-message">توضیحات</label>
                                    <textarea cols="30" rows="5" id="contact-form-message"
                                        placeholder="توضیحات مورد نظر را وارد کنید" name="content" style="background-color: whitesmoke"></textarea>
                                        @error('content')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                </div>
                                <div class="tm-form-field">
                                    <button type="submit" class="tm-button tm-button-block">ارسال</button>
                                </div>
                            </div>
                        </form>
                <p class="form-messages"></p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="tm-contact-blocks mt-30-reverse">
                <div class="tm-contact-block text-center mt-30" style="border-radius: 3%; background-color:whitesmoke">
                  <i class="ion-ios-telephone-outline"></i>
                  <h6>ارتباط با اداره</h6>
                  <p>Phone : <a href="tel:+18009156270">{{ $system_setting->phone_number }}</a></p>
                  <p>
                    Email:
                    <a href="mailto:malicfishing@gmail.com"
                      >{{ $system_setting->email }}</a
                    >
                  </p>
                </div>
                <div class="mt-30">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6575.495315408171!2d69.1296431!3d34.5092811!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d169e03c1a4a21%3A0x5610299cbe56fb81!2z2KfYr9in2LHZhyDYqti52YTbjNmF2KfYqiDYqtiu2YbbjNqp24wg2Ygg2YXYs9mE2qnbjA!5e0!3m2!1sen!2s!4v1699862074034!5m2!1sen!2s" width="570" height="220 " style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
              </div>
            </div>
          </div>
        
  </div>
      <!-- Brand Logos -->
  <div class="tm-section tm-brandlogo-area tm-padding-section" style=" background: url('{{ asset('image/images/afghanistan_map.svg') }}') no-repeat center center fixed; background-size: cover;">
        <div class="container">
            <div class="tm-brandlogo-slider">
                <!-- Brang Logo Single -->
                @foreach ($brands as $brand)
                <div class="">
                    <a href="#">
                        <img src="{{ 'uploads/images/'.$brand->image }}" alt="brand-logo" style="width:105px; background: transparent;">
                    </a>
                </div>
                @endforeach
                <!--// Brang Logo Single -->
            </div>
        </div>
</div>
    <!--// Brand Logos -->
    
</main>
<!--// Page Content -->
@endsection
