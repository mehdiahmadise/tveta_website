@component('backend.includes.content' , ['title' => 'نوعیت مرکز های تعلیمی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">نوعیت مرکز های تعلیمی</li>
    @endslot
    @section('page_title')
         لیست نوعیت مرکز های تعلیمی
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">نوعیت مرکز های تعلیمی</h3>
                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
                            {{-- @can('create-categories') --}}
                                <a href="{{ route('admin.center-type.create') }}" class="btn btn-info">ایجاد مرکز تعلیمی جدید</a>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                        @foreach ($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab"
                                    href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                    aria-selected="true">{{ $language->name }}</a>
                            </li>
                        @endforeach
    
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                        @foreach ($languages as $language)
                            @php
                                $center_types = \App\Models\CenterType::where('language', $language->lang)->orderByDesc('id')->get();
                            @endphp
                            <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                                id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="card-body">
                                    <table id="table-{{ $language->lang }}" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>نام</th>
                                                <th>کود</th>
                                                <th>حالت</th>
                                                <th>تنظیمات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($center_types as $center_type)
                                                <tr>
                                                    <td>{{ $center_type->id }}</td>
                                                    <td>{{ $center_type->name }}</td>
                                                    <td>{{ $center_type->language }}</td>
                                                    <td>
                                                        @if ($center_type->status == 1)
                                                            <span class="badge badge-success">بله</span>
                                                        @else
                                                            <span class="badge badge-danger">نخیر</span>
                                                        @endif

                                                    </td>
                                                    <td class="d-flex ">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                تنظیمات
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                {{-- @can('edit-languages') --}}
                                                                    <a href="{{ route('admin.center-type.edit' , $center_type->id) }}"
                                                                    class="dropdown-item">ویرایش</a>
                                                                {{-- @endcan --}}
                                                                {{-- @can('delete-categories') --}}
                                                                    <a href="{{ route('admin.center-type.destroy', $center_type->id) }}" class="dropdown-item delete-item">حذف</a>
                                                                {{-- @endcan --}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">
                                                    #
                                                </th>
                                                <th>نام</th>
                                                <th>کود</th>
                                                <th>حالت</th>
                                                <th>تنظیمات</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        @endforeach
    
                    </div>
                    
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    @push('scripts')
    <script>
        @foreach ($languages as $language)
            $(function () {
                $("#table-{{ $language->lang }}").dataTable({
                    "language": {
                        "paginate": {
                            "next": "بعدی",
                            "previous" : "قبلی"
                        }
                    },
                    "info" : false,
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "autoWidth": false
                });
            });
        @endforeach
    </script>
@endpush
@endcomponent
