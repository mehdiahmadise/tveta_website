@component('backend.includes.content' , ['title' => 'ویرایش ابتکار محصل'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.inovation.index') }}">همه ابتکار محصل ها</a></li>
        <li class="breadcrumb-item active">ویرایش ابتکار محصل</li>
    @endslot

    @section('styles')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="{{ asset('backend/src/jquery.md.bootstrap.datetimepicker.style.css') }}" />
        <link href="{{ asset('backend/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />
    @endsection
    
    @section('page_title')
           ویرایش ابتکار محصل
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش ابتکار محصل جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.inovation.update', $inovation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">زبان ها</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--زبان را انتخاب کنید--</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $inovation->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
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
                                    <option {{ $province->id === $inovation->province_id ? 'selected' : '' }} value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @error('province')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">انتخاب ولسوالی</label>
                            <select name="district" id="district" class="form-control select2">
                                <option value="">---انتخاب ولسوالی---</option>
                                @foreach ($districts as $district)
                                    <option {{ $district->id === $inovation->district_id ? 'selected' : '' }} value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                            @error('district')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    

                        <div class="form-group">
                            <label for="">انتخاب مرکز تعلیمی</label>
                            <select name="center_type" id="center_type" class="form-control select2">
                                <option value="">---انتخاب مرکز تعلیمی---</option>
                                @foreach ($center_types as $center_type)
                                    <option {{ $center_type->id === $inovation->center_type_id ? 'selected' : '' }} value="{{ $center_type->id }}">{{ $center_type->name }}</option>
                                @endforeach
                            </select>
                            @error('center_type')
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
                                    <img src="{{ asset($inovation->image) }}" style="width: 100px; height:60px; border-radius: 5%;" alt="">
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="">عنوان ابتکار محصل</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{ $inovation->name }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">نام محصل</label>
                            <input name="student_name" type="text" class="form-control" value="{{ $inovation->student_name }}" id="student_name">
                            @error('student_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">نام پدر</label>
                            <input name="student_father_name" value="{{ $inovation->student_father_name }}" type="text" class="form-control" id="student_father_name">
                            @error('student_father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">نام پدر کلان</label>
                            <input name="student_grand_father_name" value="{{ $inovation->student_grand_father_name }}" type="text" class="form-control" id="student_grand_father_name">
                            @error('student_grand_father_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">ادرس ابتکار محصل</label>
                            <input name="address" type="text" class="form-control" id="address" value="{{ $inovation->address }}">
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای ابتکار محصل</label>
                            <textarea name="content" class="form-control editor">{{ $inovation->content }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    

                        <div class="form-group">
                            <label for="">عنوان متا برای سئو</label>
                            <input name="meta_title" type="text" class="form-control" id="name" value="{{ $inovation->meta_title }}">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای ابتکار محصل برای سئو</label>
                            <textarea name="meta_description" class="form-control">{{ $inovation->meta_description }}</textarea>
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
                                            <input type="text" id="inputDate10" class="form-control" name="date_shamsi" placeholder="" value="{{ old('date_shami', $inovation->date_shamsi) }}" aria-label="date8"
                                              aria-describedby="date8">
                                              @error('date_shamsi')
                                                <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                            <input type="text" id="inputDate11" class="form-control" name="date_gregorian" value="{{ old('date_gregorian', $inovation->date_gregorian) }}" placeholder="" aria-label="date8"
                                              aria-describedby="date8">
                                              @error('date_gregorian')
                                                <p class="text-danger">{{ $message }}</p>
                                              @enderror
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="date_ghamari">انتخاب تاریخ هجری قمری</label>
                                        <input type="text" class="form-control hijri-date-default" name="date_ghamari" value="{{ old('date_ghamari', $inovation->date_ghamari) }}" placeholder="تاریخ هجری قمری را وارد کنید">
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
                                    <div class="control-label text-bold">حالت ابتکار محصل</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="status" {{ $inovation->status == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ویرایش</button>
                            <a href="{{ route('admin.inovation.index') }}" class="btn btn-default float-left">لغو</a>
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
                url: "{{ route('admin.fetch-inovation-province') }}",
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
                url: "{{ route('admin.fetch-inovation-district') }}",
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
