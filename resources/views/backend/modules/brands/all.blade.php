@component('backend.includes.content' , ['title' => 'حمایت کننده ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریتی</a></li>
        <li class="breadcrumb-item active">حمایت کننده</li>
    @endslot
    @section('page_title')
         لیست حمایت کننده ها
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">حمایت کننده ها</h3>
                    <div class="card-tools d-flex">
                        <form action="" class="mt-1">
                            <div class="input-group input-group-sm" style="width: 300px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1 mt-1">
                            <a href="{{ route('admin.brands.create') }}" class="btn btn-info">ایجاد حمایت کننده جدید</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>تنظیمات</th>
                            </tr>
                            @php($i = 1)
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <img src="{{ URL::asset('uploads/images/'.$brand->image) }}" style="width: 50px; height:50px; border-radius: 50%;">
                                    </td>
                                    <td class="d-flex ">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                تنظیمات
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- <a href="{{ route('brands.edit' , ['brand' => $brand->id]) }}" 
                                                    class="dropdown-item">ویرایش</a> --}}
                                                    <a href="{{ route('admin.brands.destroy', $brand->id) }}" class="dropdown-item delete-item">حذف</a>
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
                    {{ $brands->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
