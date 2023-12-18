@component('backend.includes.content' , ['title' => 'ثبت اسلایدر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">ویرایش اسلایدر</a></li>
        <li class="breadcrumb-item active">ویرایش اسلایدر</li>
    @endslot
    @section('page_title')
        ویرایش اسلایدر
    @endsection
    <div class="row">
        <div class="col-lg-12">
            @include('backend.includes.errors')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Create Slider</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="sub_heading" class="col-md-4 control-label">عنوان اول</label>
                            <input type="text" name="sub_heading" class="form-control" id="sub_heading" placeholder="عنوان اول را وارد کنید" value="{{ old('sub_heading', $slider->sub_heading) }}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="image">تصویر اسلایدر</label>
                                        <input type="file" class="form-control" name="image" placeholder="انتخاب تصویر اسلایدر">
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <img src="{{ URL::asset($slider->image) }}" alt="{{ $slider->sub_heading }}" style="width: 100px; height:50px;">
                                        <input type="hidden" name="oldimage" value="{{ $slider->image }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <label for="description">توضیحات اسلایدر</label>
                                <div class="row">
                                    <textarea name="description" id="description" class="form-control">{{ old('description', $slider->description) }}</textarea>
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
