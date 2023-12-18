@component('backend.includes.content' , ['title' => 'اسلایدر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریتی</a></li>
        <li class="breadcrumb-item active">اسلایدر</li>
    @endslot
    @section('page_title')
         لیست اسلایدر ها
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">اسلایدر</h3>
                    <div class="card-tools d-flex">
                        <form action="" class="mt-1">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm ml-1">
                            <a href="{{ route('admin.sliders.create') }}" class="btn btn-info">ثبت اسلایدر</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>عنوان</th>
                                <th>تصویر</th>
                                <th>تنظیمات</th>
                            </tr>
                            @php($i = 1)
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ Str::limit($slider->sub_heading) }}</td>
                                    <td>
                                        <img src="{{ URL::asset($slider->image) }}" alt="{{ $slider->sub_heading }}" style="width: 50px; height:50px; border-radius: 50%;">
                                    </td>
                                    <td class="d-flex ">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                تنظیمات
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('admin.sliders.edit' , ['slider' => $slider->id]) }}" 
                                                    class="dropdown-item">ویرایش</a>
                                                <form action="{{ route('admin.sliders.destroy' , ['slider' => $slider->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item servideletebtn">حذف</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $sliders->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
