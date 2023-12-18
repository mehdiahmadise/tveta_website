@component('backend.includes.content' , ['title' => 'زبان ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">زبان ها</li>
    @endslot
    @section('page_title')
         لیست زبان ها
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">زبان ها</h3>
                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="#">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
                            {{-- @can('create-languages') --}}
                                <a href="{{ route('admin.languages.create') }}" class="btn btn-info">ایجاد زبان جدید</a>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>زبان</th>
                                <th>خلاصه</th>
                                <th>پیش فرض</th>
                                <th>حالت</th>
                                <th>تنظیمات</th>
                            </tr>
                            @php($i = 1)
                            @foreach($languages as $language)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $language->name }}</td>
                                    <td>{{ $language->lang }}</td>
                                    <td>
                                        @if ($language->default == 1)
                                            <span class="badge badge-primary">{{ __('پیش فرض') }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ __('نخیر') }}</span>
                                        @endif
    
                                    </td>
                                    <td>
                                        @if ($language->status == 1)
                                        <span class="badge badge-success">{{ __('فعال') }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ __('غیر فعال') }}</span>
                                        @endif
                                    </td>
                                    <td class="d-flex ">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                تنظیمات
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- @can('edit-languages') --}}
                                                    <a href="{{ route('admin.languages.edit' , ['language' => $language->id]) }}"
                                                    class="dropdown-item">ویرایش</a>
                                                {{-- @endcan --}}
                                                {{-- @can('delete-categories') --}}
                                                    <a href="{{ route('admin.languages.destroy', $language->id) }}" class="dropdown-item delete-item">حذف</a>
                                                {{-- @endcan --}}
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
                    {{ $languages->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endcomponent
