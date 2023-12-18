@component('backend.includes.content' , ['title' => 'ویرایش درباره اداره'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">ویرایش درباره اداره</li>
    @endslot
@section('page_title')
    ویرایش درباره اداره
@endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">ویرایش درباره اداره</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" id="form" action="{{ route('admin.aboutus.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" name="title" value="{{ $aboutus->title }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="content">محتوا</label>
                                    <textarea name="content" id="editor" class="form-control" cols="30" rows="4">{{ $aboutus->content }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <img src="{{ URL::asset('image/images/'.$aboutus->image) }}" alt="img" style="width: 100px; height:50px;">
                                    <input type="hidden" name="oldImage" value="{{ $aboutus->image }}">
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
 