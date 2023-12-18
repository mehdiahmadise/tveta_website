@component('backend.includes.content' , ['title' => 'ایجاد خبر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">همه اخبار</a></li>
        <li class="breadcrumb-item active">ایجاد خبر</li>
    @endslot
    @section('page_title')
           ایجاد خبر
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد خبر جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
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
    
                        <div class="form-group">
                            <label for="">انتخاب دسته بندی</label>
                            <select name="category" id="category" class="form-control select2">
                                <option value="">---انتخاب دسته بندی---</option>
                            </select>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
    
                        <div class="form-group">
                            <label for="">انتخاب فایل</label>
                            <input type="file" name="image" class="form-control" id="image-upload">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان خبر</label>
                            <input name="title" type="text" class="form-control" id="name">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای خبر</label>
                            <textarea name="content" class="form-control editor"></textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="">تگ های خبر</label>
                            <br>
                            <input name="tags" type="text" class="form-control inputtags">
                            @error('tags')
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
                            <label for="">محتوای خبر برای سئو</label>
                            <textarea name="meta_description" class="form-control"></textarea>
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت خبر</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" value="1" class="switch" name="status">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">چکیده اخبار</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" value="1" class="switch" name="is_breaking_news">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">اسلایدر</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" value="1" class="switch" name="show_at_slider">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">خبر های محبوب</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" value="1" class="switch" name="show_at_popular">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-info">ثبت</button>
                            <a href="{{ route('admin.news.index') }}" class="btn btn-default float-left">لغو</a>
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
    $(document).ready(function() {
        $('#language-select').on('change', function() {
            let lang = $(this).val();
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.fetch-news-category') }}",
                data: {
                    lang: lang
                },
                success: function(data) {
                    $('#category').html("");
                    $('#category').html(
                        `<option value="">---انتخاب دسته بندی---</option>`);

                    $.each(data, function(index, data) {
                        $('#category').append(
                            `<option value="${data.id}">${data.name}</option>`)
                    })

                },
                error: function(error) {
                    console.log(error);
                }
            })
        })
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

@endpush
@endcomponent
