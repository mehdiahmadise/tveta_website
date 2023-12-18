@component('backend.includes.content' , ['title' => 'ثبت اسلایدر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">ایجاد اسلایدر</a></li>
        <li class="breadcrumb-item active">ایجاد اسلایدر</li>
    @endslot
    @section('page_title')
        ایجاد اسلایدر
    @endsection
    @section('styles')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    @endsection
    <div class="row">
        <div class="col-lg-12">
            @include('backend.includes.errors')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ایجاد اسلایدر</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="sub_heading" class="col-md-4 control-label">عنوان اول</label>
                            <input type="text" name="sub_heading" class="form-control" id="sub_heading" placeholder="عنوان اول را وارد کنید" value="{{ old('sub_heading') }}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <label for="image">تصویر اسلایدر</label>
                                    <input type="file" class="form-control" name="image" placeholder="تصویر را انتخاب کنید">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="description">توضیحات اسلایدر</label>
                                <div class="row">
                                    <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                        <a href="{{ route('admin.sliders.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
