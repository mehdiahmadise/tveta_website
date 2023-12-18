@component('backend.includes.content' , ['title' => 'ویرایش خبر'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.news.index') }}">همه اخبار</a></li>
        <li class="breadcrumb-item active">ویرایش خبر</li>
    @endslot
    @section('page_title')
           ویرایش خبر
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش خبر جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">زبان ها</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--زبان را انتخاب کنید--</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $news->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
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
                                @foreach ($categories as $category)
                                    <option {{ $category->id === $news->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
    
                        <div class="form-group">
                            
                            <div class="row">   
                                <div class="col-md-6">
                                    <label for="">انتخاب فایل</label>
                                    <input type="file" name="image" class="form-control" id="image-upload">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <img src="{{ asset($news->image) }}" style="width: 100px; height:60px; border-radius: 5%;" alt="">
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان خبر</label>
                            <input name="title" type="text" class="form-control" id="name" value="{{ $news->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای خبر</label>
                            <textarea name="content" class="form-control editor">{{ $news->content }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label class="">تگ های خبر</label>
                            <br>
                            <input name="tags" type="text" class="form-control inputtags" value="{{ formatTags($news->tags()->pluck('name')->toArray()) }}">
                            @error('tags')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان متا برای سئو</label>
                            <input name="meta_title" type="text" class="form-control" id="name" value="{{ $news->meta_title }}">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای خبر برای سئو</label>
                            <textarea name="meta_description" class="form-control">{{ $news->meta_description }}</textarea>
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت خبر</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="status" {{ $news->status == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">چکیده اخبار</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="is_breaking_news" {{ $news->is_breaking_news == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">اسلایدر</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="show_at_slider" {{ $news->show_at_slider == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">خبر های محبوب</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="show_at_popular" {{ $news->show_at_popular == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ثبت</button>
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
