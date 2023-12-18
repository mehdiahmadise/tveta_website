@component('backend.includes.content' , ['title' => 'تنظیمات سیستم'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">پنل مدیریتی</a></li>
        <li class="breadcrumb-item active">تنظیمات سیستم</li>
    @endslot
@section('page_title')
    تنظیمات سیستم
@endsection
    <div class="row">
        <div class="col-lg-12">
            @include('backend.includes.errors')
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">تنظیمات</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" id="form" action="{{ route('admin.site-setting.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="logo">لوگو</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <img src="{{ URL::asset($setting->logo) }}" alt="img" style="width: 80px; height:80px; object-fit:cover">
                                    <input type="hidden" name="oldlogo" value="{{ $setting->logo }}">
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="banner">بنر صفحات</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <img src="{{ URL::asset($setting->banner) }}" alt="img" style="width: 100px; height:50px; object-fit: cover">
                                    <input type="hidden" name="oldbanner" value="{{ $setting->banner }}">
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="email" class=" control-label">ایمیل</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Please Enter Email" value="{{ old('email', $setting->email) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone_number" class=" control-label">شماره تما</label>
                                        <input type="number" name="phone_number" id="phone_number" class="form-control" placeholder="Please Enter Phone Number" value="{{ old('phone_number', $setting->phone_number) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone_number2" class=" control-label">شماره تماس دوم</label>
                                        <input type="number" name="phone_number2" id="phone_number2" class="form-control" placeholder="Please Enter Phone Number 2" value="{{ old('phone_number2', $setting->phone_number2) }}">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="address" class=" control-label">ادرس</label>
                                    <input type="text" name="address" id="address" class="form-control" placeholder="Please Enter Address" value="{{ old('address', $setting->address) }}">
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label for="footer_description">توضیحات فوتر</label>
                                    <div class="row">
                                        <textarea name="footer_description" id="footer_description" cols="30" rows="3" class="form-control" placeholder="Please Enter Footer Description">{{ old('footer_description', $setting->footer_description) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="face_book_url" class=" control-label">لینک فیسبوک</label>
                                        <input type="text" name="face_book_url" id="face_book_url" class="form-control" placeholder="Please Enter Facebook Link" value="{{ old('face_book_url', $setting->face_book_url) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="linkedin_url" class=" control-label">لینک لینکدین</label>
                                        <input type="text" name="linkedin_url" id="linkedin_url" class="form-control" placeholder="Please Enter Linkedin Link" value="{{ old('linkedin_url', $setting->linkedin_url) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="twitter_url" class=" control-label">لینک تویتر</label>
                                        <input type="text" name="twitter_url" id="twitter_url" class="form-control" placeholder="Please Enter Twitter Link" value="{{ old('twitter_url', $setting->twitter_url) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="instagram_url" class=" control-label">لینک انستاگرام</label>
                                        <input type="text" name="instagram_url" id="instagram_url" class="form-control" placeholder="Please Enter Instagram Link" value="{{ old('instagram_url', $setting->instagram_url) }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="youtube_url" class=" control-label">لینک یوتیوب</label>
                                        <input type="text" name="youtube_url" id="youtube_url" class="form-control" placeholder="Please Enter Youtube Link" value="{{ old('youtube_url', $setting->youtube_url) }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
 