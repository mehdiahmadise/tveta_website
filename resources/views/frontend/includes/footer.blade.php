<!-- Footer -->
<div class="tm-footer">
  <div class="tm-footer-toparea tm-padding-section"     
      data-black-overlay="9">
      <div class="container">
          <div class="widgets widgets-footer row">

              <!-- Single Widget -->
              <div class="col-lg-3 col-md-6 col-12">
                  <div class="single-widget widget-info">
                      <a class="widget-info-logo" href="#">
                        <img src="{{ URL::asset($system_setting->logo) }}"
                              alt="white logo" style="width: 100px; border-radius: 50%;">
                      </a>
                      <p style="color: rgb(29, 23, 23)">{{ $system_setting->footer_description }}</p>
                      <ul>
                        <li>
                          <a href="{{ $system_setting->face_book_url }}"><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                          <a href="{{ $system_setting->instagram_url }}"><i class="ion-social-instagram-outline"></i></a>
                        </li>
                        <li>
                          <a href="{{ $system_setting->youtube_url }}"><i class="ion-social-youtube-outline"></i></a>
                        </li>
                        <li>
                          <a href="{{ $system_setting->linkedin_url }}"><i class="ion-social-linkedin-outline"></i></a>
                        </li>
                        <li>
                          <a href="{{ $system_setting->twitter }}"><i class="ion-social-twitter-outline"></i></a>
                        </li>
                        <li>
                          <a href="https://takhnik.tveta.gov.af/da/home"><img src="{{ asset('logo/takhnik_logo.png') }}" alt="" style="width: 25px;" class="mt-1"></a>
                        </li>
                      </ul>
                  </div>
              </div>
              <!--// Single Widget -->

              <!-- Single Widget -->
              <div class="col-lg-3 col-md-6 col-12">
                  <div class="single-widget widget-contact">
                      <h6 class="widget-title">{{ __('frontend.contact-with-office') }}</h6>
                      <ul>
                        <li>
                          <i class="ion-ios-telephone"></i>
                          <p>{{ $system_setting->phone_number }}</p>
                          <p>{{ $system_setting->phone_number2 }}</p>
                        </li>
                        <li>
                          <i class="ion-email"></i>
                          <p>{{ $system_setting->email }}</p>
                        </li>
                        <li>
                          <i class="ion-ios-location"></i>
                          <p>{{ $system_setting->address }}</p>
                        </li>
                      </ul>
                  </div>
              </div>
              <!--// Single Widget -->

              <!-- Single Widget -->
              <div class="col-lg-3 col-md-6 col-12">
                  <div class="single-widget widget-twitterfeed">
                      <h6 class="widget-title">ارگان های مرتبط</h6>
                      <ul>
                        <li>
                          <h6>
                            <a href="https://www.mohe.gov.af/">وزارت تحصیلات عالی</a>
                          </h6>
                        </li>
                        <li>
                          <h6>
                            <a href="https://moe.gov.af/dr">وزارت معارف</a>
                          </h6>
                        </li>
                        <li>
                          <h6>
                            <a href="https://molsa.gov.af/dr">وزارت کار و امور اجتماعی</a>
                            
                          </h6>
                        </li>
                      </ul>
                  </div>
              </div>
              <!--// Single Widget -->


              <!-- Single Widget -->
              <div class="col-lg-3 col-md-6 col-12">
                <div class="single-widget widget-twitterfeed">
                    <h6 class="widget-title">لینک های داخلی وبسایت</h6>
                    <ul>
                      <li>
                        <h6>
                          <a href="#">کاریابی</a>
                        </h6>
                      </li>
                      <li>
                        <h6>
                          <a href="#">مراجع اطلاع رسانی</a>
                        </h6>
                      </li>
                      <li>
                        <h6>
                          <a href="#">چارت تشکیلاتی</a>
                          
                        </h6>
                      </li>
                      <li>
                        <h6>
                          <a href="https://takhnik.tveta.gov.af/da/home">سیستم تخنیک و مسلک</a>
                          
                        </h6>
                      </li>
                    </ul>
                </div>
            </div>
            <!--// Single Widget -->
          </div>
      </div>
  </div>
  <div class="tm-footer-bottomarea bg-dark">
      <div class="container">
          <div class="row d-flex justify-content-center">
                  <p class="tm-footer-copyright">تمامی حقوق این سایت متعلق به اداره تعلیمات تخنیکی و مسلکی است</p>
              
          </div>
      </div>
  </div>
</div>
<!--// Footer -->