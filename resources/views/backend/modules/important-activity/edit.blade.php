@component('backend.includes.content' , ['title' => 'ویرایش فعالیت مهم'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.important-activity.index') }}">همه فعالیت های مهم</a></li>
        <li class="breadcrumb-item active">ویرایش فعالیت مهم</li>
    @endslot
    @section('page_title')
           ویرایش فعالیت مهم
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش فعالیت مهم جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.important-activity.update', $important_activity->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">زبان ها</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--زبان را انتخاب کنید--</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $important_activity->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
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
                                    <option {{ $category->id === $important_activity->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <img src="{{ asset($important_activity->image) }}" style="width: 100px; height:60px; border-radius: 5%;" alt="">
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان فعالیت مهم</label>
                            <input name="title" type="text" class="form-control" id="name" value="{{ $important_activity->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای فعالیت مهم</label>
                            <textarea name="description" class="form-control editor">{{ $important_activity->description }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    

                        <div class="form-group">
                            <label for="">عنوان متا برای سئو</label>
                            <input name="meta_title" type="text" class="form-control" id="name" value="{{ $important_activity->meta_title }}">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای فعالیت مهم برای سئو</label>
                            <textarea name="meta_description" class="form-control">{{ $important_activity->meta_description }}</textarea>
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="inputDate10">انتخاب تاریخ هجری شمسی</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text cursor-pointer" id="date8">اینجا کلیک کنید</span>
                                            </div>
                                            <input type="text" id="inputDate10" class="form-control" name="date_shamsi" placeholder="" value="{{ old('date_shami', $important_activity->date_shamsi) }}" aria-label="date8"
                                              aria-describedby="date8">
                                              @error('date_shamsi')
                                                <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            <input type="text" id="inputDate11" class="form-control" name="date_gregorian" value="{{ old('date_gregorian', $important_activity->date_gregorian) }}" placeholder="" aria-label="date8"
                                              aria-describedby="date8">
                                              @error('date_gregorian')
                                                <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_ghamari">انتخاب تاریخ هجری قمری</label>
                                        <input type="text" class="form-control hijri-date-default" name="date_ghamari" value="{{ old('date_ghamari', $important_activity->date_ghamari) }}" placeholder="تاریخ هجری قمری را وارد کنید">
                                        @error('date_ghamari')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت فعالیت مهم</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="status" {{ $important_activity->status == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ثبت</button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-default float-left">لغو</a>
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
                url: "{{ route('admin.fetch-important-activity-category') }}",
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
