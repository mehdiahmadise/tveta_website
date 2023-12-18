@component('backend.includes.content' , ['title' => 'ویرایش فورم عرضه خدمات'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.headships.index') }}">همه فورم های عرضه خدمات</a></li>
        <li class="breadcrumb-item active">ویرایش فورم عرضه خدمات</li>
    @endslot
    @section('styles')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    @endsection
    @section('page_title')
           ویرایش فورم عرضه خدمات
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش فورم عرضه خدمات جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.headships.update', $headship->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">زبان ها</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--زبان را انتخاب کنید--</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $headship->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="title">عنوان فورم عرضه خدمات</label>
                            <input name="title" type="text" class="form-control" id="title" value="{{ $headship->title }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">محتوای فورم عرضه خدمات</label>
                            <textarea name="content" class="form-control editor">{{ $headship->content }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    

                        <div class="form-group">
                            <label for="">عنوان متا برای سئو</label>
                            <input name="meta_title" type="text" class="form-control" id="name" value="{{ $headship->meta_title }}">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای فورم عرضه خدمات برای سئو</label>
                            <textarea name="meta_description" class="form-control">{{ $headship->meta_description }}</textarea>
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت فورم عرضه خدمات</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="status" {{ $headship->status == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ویرایش</button>
                            <a href="{{ route('admin.headships.index') }}" class="btn btn-default float-left">لغو</a>
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

@endpush
@endcomponent
