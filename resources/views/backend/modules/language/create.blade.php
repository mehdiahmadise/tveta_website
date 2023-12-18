@component('backend.includes.content' , ['title' => 'ایجاد زبان'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">همه زبان ها</a></li>
        <li class="breadcrumb-item active">ایجاد زبان</li>
    @endslot

    @section('page_title')
           ایجاد زبان
    @endsection

    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ایجاد زبان جدید</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('admin.languages.store') }}" method="POST">
                        @csrf
                        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">{{ __('زبان') }}</label>
                                <select name="lang" id="language-select" class="form-control select2">
                                    <option value="">--{{ __('زبان را انتخاب کنید') }}--</option>
                                    @foreach (config('languages') as $key => $lang)
                                        <option value="{{ $key }}">{{ $lang['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('lang')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
        
                            </div>
        
                            <div class="form-group">
                                <label for="">{{ __('نام') }}</label>
                                <input readonly name="name" type="text" class="form-control" id="name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="">{{ __('اسلاگ') }}</label>
                                <input readonly name="slug" type="text" class="form-control" id="slug">
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="">{{ __('زبان پیشفرض') }} </label>
                                <select name="default" id="" class="form-control">
                                    <option value="0">نخیر</option>
                                    <option value="1">بلی</option>
                                </select>
                                @error('defalut')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="">{{ __('حالت') }}</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">فعال</option>
                                    <option value="0">غیر فعال</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ثبت زبان</button>
                            <a href="{{ route('admin.languages.index') }}" class="btn btn-default float-left">لغو</a>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#language-select').on('change', function() {
            let value = $(this).val();
            let name = $(this).children(':selected').text();
            $('#slug').val(value);
            $('#name').val(name);
        })
    });

    $(function () {
        $('.select2').select2()
    })
</script>
@endpush
@endcomponent
