@component('backend.includes.content' , ['title' => 'ویرایش ولسوالی'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.district.index') }}">همه ولسوالی ها</a></li>
        <li class="breadcrumb-item active">ویرایش ولسوالی</li>
    @endslot

    @section('page_title')
           ویرایش ولسوالی
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش ولسوالی جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.district.update', $district->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">انتخاب زبان</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">انتخاب زبان</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $district->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
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
                                @foreach ($provinces as $province)
                                    <option {{ $province->id === $district->province_id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('province')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">نام</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $district->name) }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">حالت</label>
                            <select name="status" id="" class="form-control">
                                <option {{ $district->status === 1 ? 'selected' : '' }} value="1">فعال</option>
                                <option {{ $district->status === 0 ? 'selected' : '' }} value="0">غیر فعال</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">ویرایش</button>
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
</script>
<script>
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
            })
        })
    })
</script>

@endpush
@endcomponent
