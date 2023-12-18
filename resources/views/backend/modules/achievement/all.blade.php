@component('backend.includes.content' , ['title' => 'دستاورد ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">دستاورد ها</li>
    @endslot
    @section('page_title')
         لیست دستاورد ها
    @endsection
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">دستاورد ها</h3>
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
                                <a href="{{ route('admin.achievement.create') }}" class="btn btn-info">ایجاد دستاورد جدید</a>
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
                                $achievements = \App\Models\Achievement::where('language', $language->lang)->orderByDesc('id')->get();
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
                                                <th>تصویر</th>
                                                <th>عنوان دستاورد</th>
                                                <th>حالت</th>
                                                <th>تنظیمات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($achievements as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>
                                                        <img src="{{ asset($item->image) }}" style="width: 100px; height:60px; border-radius: 5%;" alt="">
                                                    </td>
                                                    <td>{{ $item->subject }}</td>
                                                    <td>
                                                        <input id="s2" type="checkbox" value="1" class="switch toggle-status" data-id="{{ $item->id }}" data-name="status" {{ $item->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td class="d-flex ">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                تنظیمات
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                {{-- @can('edit-languages') --}}
                                                                    <a href="{{ route('admin.achievement.edit' , $item->id) }}" class="dropdown-item">ویرایش</a>
                                                                {{-- @endcan --}}
                                                                {{-- @can('delete-categories') --}}
                                                                    <a href="{{ route('admin.achievement.destroy', $item->id) }}" class="dropdown-item delete-item">حذف</a>
                                                                {{-- @endcan --}}
                                                                <a href="{{ route('admin.achievement-copy', $item->id) }}" class="dropdown-item">کاپی</a>
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
                                                <th>تصویر</th>
                                                <th>عنوان دستاورد</th>
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

        $(document).ready(function(){
            $('.toggle-status').on('click', function(){
                let id = $(this).data('id');
                let name = $(this).data('name');
                let status = $(this).prop('checked') ? 1 : 0;

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.toggle-achievement-status') }}",
                    data: {
                        id:id,
                        name:name,
                        status:status
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                })
            })
        })
        
    </script>
@endpush
@endcomponent
