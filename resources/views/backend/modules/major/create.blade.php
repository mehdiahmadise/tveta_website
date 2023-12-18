@component('backend.includes.content' , ['title' => 'ایجاد دسته بندی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.major.index') }}">همه دسته بندی ها</a></li>
        <li class="breadcrumb-item active">ایجاد دسته بندی</li>
    @endslot

    @section('page_title')
           ایجاد دسته بندی
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد دسته بندی جدید</h3>
                    <hr>
                    <form action="{{ route('admin.major.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">انتخاب زبان</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">انتخاب زبان</option>
                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
    
                        </div>
                        <div class="form-group">
                            <label for="">نام</label>
                            <input name="name" type="text" class="form-control" id="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">حالت</label>
                            <select name="status" id="" class="form-control">
                                <option value="1">فعال</option>
                                <option value="0">غیر فعال</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">ایجاد</button>
                        <a href="{{ route('admin.major.index') }}" class="btn btn-default float-left">لغو</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<script>
     $(function () {
        $('.select2').select2()
    })
</script>
@endpush
@endcomponent
