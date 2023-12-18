@component('backend.includes.content' , ['title' => 'Create brand'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('backend.index') }}">پنل مدیریتی</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">ایجاد کردن حمایت کننده</a></li>
        <li class="breadcrumb-item active">ایجاد حمایت کننده ها</li>
    @endslot
    @section('page_title')
        ایجاد حمایت کننده ها
    @endsection

    <div class="row">
        <div class="col-lg-12">
            @include('backend.includes.errors')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ایجاد حمایت کننده ها</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <label for="image">تصویر برند حمایت کننده</label>
                                    <input type="file" class="form-control" name="image" placeholder="Please brand Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت حمایت کننده</button>
                        <a href="{{ route('admin.brands.index') }}" class="btn btn-default float-left">لغو</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
