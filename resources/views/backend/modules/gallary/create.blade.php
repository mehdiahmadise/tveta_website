@component('backend.includes.content' , ['title' => 'ثبت گالری'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.gallaries.index') }}">ایجاد گالری</a></li>
        <li class="breadcrumb-item active">ایجاد گالری</li>
    @endslot
    @section('page_title')
        ایجاد گالری
    @endsection
    <div class="row">
        <div class="col-lg-12">
            @include('backend.includes.errors')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ایجاد گالری</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.gallaries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="image1">تصویر گالری</label>
                                        <input type="file" class="form-control" name="image1" placeholder="تصویر را انتخاب کنید">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image_size1">اندازه تصویر</label>
                                         <select name="image_size1" id="image_size1" class="form-control">
                                            <option value="">اندازه تصویر را انتخاب کنید</option>
                                            <option value="col-md-3">کوچک</option>
                                            <option value="col-md-4">متوسط</option>
                                            <option value="col-md-5">بزرگ</option>
                                         </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="image2">تصویر گالری</label>
                                        <input type="file" class="form-control" name="image2" placeholder="تصویر را انتخاب کنید">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image_size2">اندازه تصویر</label>
                                         <select name="image_size2" id="image_size2" class="form-control">
                                            <option value="">اندازه تصویر را انتخاب کنید</option>
                                            <option value="col-md-3">کوچک</option>
                                            <option value="col-md-4">متوسط</option>
                                            <option value="col-md-5">بزرگ</option>
                                         </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="image3">تصویر گالری</label>
                                        <input type="file" class="form-control" name="image3" placeholder="تصویر را انتخاب کنید">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="image_size3">اندازه تصویر</label>
                                         <select name="image_size3" id="image_size3" class="form-control">
                                            <option value="">اندازه تصویر را انتخاب کنید</option>
                                            <option value="col-md-3">کوچک</option>
                                            <option value="col-md-4">متوسط</option>
                                            <option value="col-md-5">بزرگ</option>
                                         </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.gallaries.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
