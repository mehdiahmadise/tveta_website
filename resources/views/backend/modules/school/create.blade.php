@component('backend.includes.content' , ['title' => 'ایجاد لیسه'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.school.index') }}">همه لیسه ها</a></li>
        <li class="breadcrumb-item active">ایجاد لیسه</li>
    @endslot

    @section('styles')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="{{ asset('backend/src/jquery.md.bootstrap.datetimepicker.style.css') }}" />
        <link href="{{ asset('backend/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />
    @endsection
    
    @section('page_title')
           ایجاد لیسه
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ایجاد لیسه جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.school.store') }}" method="POST" enctype="multipart/form-data">
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
                        {{-- province and districts --}}

                        <div class="form-group">
                            <label for="">انتخاب ولایت</label>
                            <select name="province" id="province-select" class="form-control select2">
                                <option value="">---انتخاب ولایت---</option>
                            </select>
                            @error('province')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        
    
                        <div class="form-group">
                            <label for="">انتخاب ولسوالی</label>
                            <select name="district" id="district" class="form-control select2">
                                <option value="">---انتخاب ولسوالی---</option>
                            </select>
                            @error('district')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">مرکز تعلیمی</label>
                            <select name="center_type" class="form-control select2">
                                <option value="">--مرکز تعلیمی را انتخاب کنید--</option>
                                @foreach ($center_types as $center_type)
                                    <option value="{{ $center_type->id }}">{{ $center_type->name }}</option>
                                @endforeach
                            </select>
                            @error('center_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- end of province and districtse --}}
    
    
                        <div class="form-group">
                            <label for="">انتخاب فایل</label>
                            <input type="file" name="image" class="form-control" id="image-upload">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان لیسه</label>
                            <input name="name" type="text" class="form-control" id="name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">ادرس لیسه</label>
                            <input name="address" type="text" class="form-control" id="address">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای لیسه</label>
                            <textarea name="content" class="form-control editor"></textarea>
                            @error('content')
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
                            <label for="">محتوای لیسه برای سئو</label>
                            <textarea name="meta_description" class="form-control"></textarea>
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
                                            <input type="text" id="inputDate10" class="form-control" name="date_shamsi" placeholder="" value="{{ old('date_shami') }}" aria-label="date8"
                                              aria-describedby="date8">
                                            <input type="text" id="inputDate11" class="form-control" name="date_gregorian" value="{{ old('date_gregorian') }}" placeholder="" aria-label="date8"
                                              aria-describedby="date8">
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_ghamari">انتخاب تاریخ هجری قمری</label>
                                        <input type="text" class="form-control hijri-date-default" name="date_ghamari" value="{{ old('date_ghamari') }}" placeholder="تاریخ هجری قمری را وارد کنید">
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت لیسه</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" value="1" class="switch" name="status">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-info">ثبت</button>
                            <a href="{{ route('admin.school.index') }}" class="btn btn-default float-left">لغو</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script src="{{ asset('backend/src/jquery.md.bootstrap.datetimepicker.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/moment-hijri@2.1.2/moment-hijri.min.js"></script>
<script src="{{ asset('backend/js/bootstrap-hijri-datetimepicker.js') }}"></script>

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
                url: "{{ route('admin.fetch-school-province') }}",
                data: {
                    lang: lang
                },
                success: function(data) {
                    $('#province-select').html("");
                    $('#province-select').html(
                        `<option value="">---انتخاب ولایت---</option>`);

                    $.each(data, function(index, data) {
                        $('#province-select').append(
                            `<option value="${data.id}">${data.name}</option>`)
                    })

                },
                error: function(error) {
                    console.log(error);
                }
            })
        });

        $('#province-select').on('change', function() {
            let province = $(this).val();
            
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.fetch-school-district') }}",
                data: {
                    province: province
                },
                success: function(data) {
                    $('#district').html("");
                    $('#district').html(
                        `<option value="">---انتخاب ولسوالی---</option>`);

                    $.each(data, function(index, data) {
                        $('#district').append(
                            `<option value="${data.id}">${data.name}</option>`)
                    })

                },
                error: function(error) {
                    console.log(error);
                }
            })
        });
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

<script type="text/javascript">
        
    $('#date8').MdPersianDateTimePicker({
    targetTextSelector: '#inputDate10',
    targetDateSelector: '#inputDate11',
    enableTimePicker: true,
    modalMode: false,
    dateFormat: 'yyyy-MM-dd',
    textFormat: 'yyyy-MM-dd',
    });
</script>

<script type="text/javascript">
    $(function () {

         initHijrDatePicker();

         initHijrDatePickerDefault();

         $('.disable-date').hijriDatePicker({

             minDate:"2020-01-01",
             maxDate:"2021-01-01",
             viewMode:"years",
             hijri:true,
             debug:true
         });

     });

     function initHijrDatePicker() {

         $(".hijri-date-input").hijriDatePicker({
             locale: "ar-sa",
             format: "DD-MM-YYYY",
             hijriFormat:"iYYYY-iMM-iDD",
             dayViewHeaderFormat: "MMMM YYYY",
             hijriDayViewHeaderFormat: "iMMMM iYYYY",
             showSwitcher: true,
             allowInputToggle: true,
             showTodayButton: false,
             useCurrent: true,
             isRTL: false,
             viewMode:'months',
             keepOpen: false,
             hijri: false,
             debug: true,
             showClear: true,
             showTodayButton: true,
             showClose: true
         });
     }

     function initHijrDatePickerDefault() 
     {
         $(".hijri-date-default").hijriDatePicker();
     }

    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script>
        try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
            return true;
        }).catch(function(e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
        } catch (error) {
        console.log(error);
        }
    </script>

@endpush
@endcomponent
