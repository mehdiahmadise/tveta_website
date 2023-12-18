@component('backend.includes.content' , ['title' => 'ایجاد ولسوالی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.district.index') }}">همه ولسوالی ها</a></li>
        <li class="breadcrumb-item active">ایجاد ولسوالی</li>
    @endslot

    @section('page_title')
           ایجاد ولسوالی
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد ولسوالی جدید</h3>
                    <form action="{{ route('admin.district.store') }}" method="POST">
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
                            <label for="">انتخاب ولایت</label>
                            <select name="province" id="province" class="form-control select2">
                                <option value="">---انتخاب ولایت---</option>
                            </select>
                            @error('province')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">نام</label>
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
                        <a href="{{ route('admin.district.index') }}" class="btn btn-default float-left">لغو</a>
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

    $(document).ready(function() {
        $('#language-select').on('change', function() {
            let lang = $(this).val();
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.fetch-district-province') }}",
                data: {
                    lang: lang
                },
                success: function(data) {
                    $('#province').html("");
                    $('#province').html(
                        `<option value="">---انتخاب ولایت---</option>`);

                    $.each(data, function(index, data) {
                        $('#province').append(
                            `<option value="${data.id}">${data.name}</option>`)
                    })

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endpush
@endcomponent
