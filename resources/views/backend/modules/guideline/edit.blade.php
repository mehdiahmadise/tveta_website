@component('backend.includes.content' , ['title' => 'ویرایش رهنمود'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">پنل مدیریت</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.guidelines.index') }}">همه رهنمود ها</a></li>
        <li class="breadcrumb-item active">ویرایش رهنمود</li>
    @endslot
    @section('styles')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <link rel="stylesheet" href="{{ asset('backend/src/jquery.md.bootstrap.datetimepicker.style.css') }}" />
        <link href="{{ asset('backend/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" />
    @endsection
    @section('page_title')
           ویرایش رهنمود
    @endsection
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">ویرایش رهنمود جدید</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.guidelines.update', $guideline->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">زبان ها</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--زبان را انتخاب کنید--</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $guideline->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
    
                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6">
                                    <label for="">انتخاب فایل تصویر</label>
                                    <input type="file" name="image" class="form-control" id="image-upload">
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <img src="{{ asset($guideline->image) }}" style="width: 100px; height:60px; border-radius: 5%;" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">   
                                <div class="col-md-6">
                                    <label for="">انتخاب فایل</label>
                                    <input type="file" name="file" class="form-control" id="image-upload">
                                    @error('file')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-4">
                                    <img src="{{ asset($guideline->file) }}" style="width: 100px; height:60px; border-radius: 5%;" alt="">
                                </div>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="subject">عنوان رهنمود</label>
                            <input name="subject" type="text" class="form-control" id="subject" value="{{ $guideline->subject }}">
                            @error('subject')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">محتوای رهنمود</label>
                            <textarea name="content" class="form-control editor">{{ $guideline->content }}</textarea>
                            @error('content')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    

                        <div class="form-group">
                            <label for="">عنوان متا برای سئو</label>
                            <input name="meta_title" type="text" class="form-control" id="name" value="{{ $guideline->meta_title }}">
                            @error('meta_title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="form-group">
                            <label for="">محتوای رهنمود برای سئو</label>
                            <textarea name="meta_description" class="form-control">{{ $guideline->meta_description }}</textarea>
                            @error('meta_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label text-bold">حالت رهنمود</div>
                                    <label class="custom-switch mt-2">
                                        <input id="s2" type="checkbox" class="switch" name="status" {{ $guideline->status == 1 ? 'checked' : '' }} value="1">
                                    </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">ویرایش</button>
                            <a href="{{ route('admin.guidelines.index') }}" class="btn btn-default float-left">لغو</a>
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
