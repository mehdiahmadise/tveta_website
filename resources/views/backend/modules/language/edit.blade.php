@component('backend.includes.content' , ['title' => 'ویرایش زبان'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.languages.index') }}">همه زبان ها</a></li>
        <li class="breadcrumb-item active">ویرایش زبان</li>
    @endslot

    @section('page_title')
           ویرایش زبان
    @endsection

    <div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">ویرایش زبان جدید</h3>
                    </div>
                    <form class="form-horizontal" action="{{ route('admin.languages.update', $language->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">{{ __('زبان') }}</label>
                                <select name="lang" id="language-select" class="form-control select2">
                                    <option value="">--{{ __('Select') }}--</option>
                                    @foreach (config('languages') as $key => $lang)
                                        <option
                                        @if ($language->lang === $key)
                                            selected
                                        @endif
                                        value="{{ $key }}">{{ $lang['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('lang')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
        
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('نام') }}</label>
                                <input readonly name="name" value="{{ $language->name }}" type="text" class="form-control" id="name">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('اسلاگ') }}</label>
                                <input readonly name="slug" value="{{ $language->slug }}" type="text" class="form-control" id="slug">
                                @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('زبان پیش فرض سیستم؟') }} </label>
                                <select name="default" id="" class="form-control">
                                    <option {{ $language->default === 0 ? 'selected' : '' }} value="0">نخیر</option>
                                    <option {{ $language->default === 1 ? 'selected' : '' }} value="1">بلی</option>
                                </select>
                                @error('defalut')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('حالت') }}</label>
                                <select name="status" id="" class="form-control">
                                    <option {{ $language->status === 1 ? 'selected' : '' }} value="1">فعال</option>
                                    <option {{ $language->status === 0 ? 'selected' : '' }} value="0">غیر فعال</option>
                                </select>
                                @error('status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ویرایش زبان</button>
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
        })

        $(function () {
            $('.select2').select2()
        })
    </script>
@endpush
@endcomponent
