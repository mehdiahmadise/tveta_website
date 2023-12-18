@component('backend.includes.content' , ['title' => 'پروفایل کاربری'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">زبان ها</li>
    @endslot
    @section('page_title')
         پروفایل کاربر
    @endsection

    <section class="section">
        
        <div class="section-body">
            <h2 class="section-title">سلام {{ $user->name }}</h2>

            <div class="row mt-sm-4">

                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile.update', auth()->guard('admin')->user()->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>ویرایش پروفایل کاربر</h4>
                            </div>
                            <div class="card-body">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="image-preview" class="image-preview mb-3" >
                                                <label for="image-upload" id="image-label">انتخاب فایل</label>
                                                <input type="file" name="image" id="image-upload">
                                                <input type="hidden" name="old_image" value="{{ $user->image }}">
                                            </div>
                                            @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{ asset($user->image) }}" alt="hey" style="width: 80px; height:80px; border-radius: 50%;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-12">
                                    <label>نام</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" required="" name="name">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Please fill in the name') }}
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>ایمیل</label>
                                    <input type="text" class="form-control" value="{{ $user->email }}" required="" name="email">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Please fill in the email') }}
                                    </div>
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post" action="{{ route('admin.profile-password.update', $user->id) }}" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>ویرایش</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-12">
                                    <label>پسورد سابق</label>
                                    <input type="password" class="form-control" value="" required="" name="current_password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Please fill in the old password') }}
                                    </div>
                                    @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>پسورد جدید</label>
                                    <input type="password" class="form-control" value="" required="" name="password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Please fill in the new password') }}
                                    </div>
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>تایید پسورد</label>
                                    <input type="password" class="form-control" value="" required="" name="password_confirmation">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Please fill in the confirmed password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endcomponent

