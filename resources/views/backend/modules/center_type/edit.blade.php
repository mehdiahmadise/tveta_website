@component('backend.includes.content' , ['title' => 'ایجاد نوعیت مرکز تعلیمی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.center-type.index') }}">همه نوعیت مرکز تعلیمی ها</a></li>
        <li class="breadcrumb-item active">ایجاد نوعیت مرکز تعلیمی</li>
    @endslot

    @section('page_title')
           ایجاد نوعیت مرکز تعلیمی
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد نوعیت مرکز تعلیمی جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.center-type.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">انتخاب زبان</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">انتخاب زبان</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $category->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
    
                        </div>
                        <div class="form-group">
                            <label for="name">نام</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $category->name) }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">حالت</label>
                            <select name="status" id="" class="form-control">
                                <option {{ $category->status === 1 ? 'selected' : '' }} value="1">فعال</option>
                                <option {{ $category->status === 0 ? 'selected' : '' }} value="0">غیر فعال</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">ایجاد</button>
                        <a href="{{ route('admin.center-type.index') }}" class="btn btn-default float-left">لغو</a>
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
