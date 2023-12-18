@component('backend.includes.content' , ['title' => 'ایجاد فایل عرضه خدمات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.headship-forms.index') }}">همه فایل های عرضه خدمات</a></li>
        <li class="breadcrumb-item active">ایجاد فایل عرضه خدمات</li>
    @endslot
    
    @section('page_title')
           ایجاد فایل عرضه خدمات
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد فایل عرضه خدمات جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.headship-forms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">زبان ها</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--زبان را انتخاب کنید--</option>
                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- end of province and districtse --}}

                        <div class="form-group">
                            <label for="">عنوان فورم عرضه خدمات</label>
                            <select name="headship_id" class="form-control select2">
                                <option value="">--عنوان را انتخاب کنید--</option>
                                @foreach ($headships as $headship)
                                    <option value="{{ $headship->id }}">{{ $headship->title }}</option>
                                @endforeach
                            </select>
                            @error('headship_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان فایل عرضه خدمات</label>
                            <input name="title" type="text" class="form-control" id="title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">انتخاب فایل</label>
                            <input type="file" name="file" class="form-control" id="file-upload">
                            @error('file')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="">محتوای فایل عرضه خدمات</label>
                            <textarea name="content" class="form-control editor"></textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان متا برای سئو</label>
                            <input name="meta_title" type="text" class="form-control" id="name">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای فایل عرضه خدمات برای سئو</label>
                            <textarea name="meta_description" class="form-control"></textarea>
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت فایل عرضه خدمات</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" value="1" class="switch" name="status">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-info">ثبت</button>
                            <a href="{{ route('admin.headship-forms.index') }}" class="btn btn-default float-left">لغو</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
     $(function () {
        $('.select2').select2()
    })
</script>

<script>
    ClassicEditor
            .create( document.querySelector( '.editor' ), {
                language: {
                    ui: 'ar',
                    content: 'ar'
                }    
            })
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

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
                url: "{{ route('admin.toggle-headship-form-status') }}",
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
