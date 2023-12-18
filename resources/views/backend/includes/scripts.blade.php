<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('backend/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('backend/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/plugins/select2/select2.full.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{ asset('backend/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

@include('sweetalert::alert')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    $(".inputtags").tagsinput('items');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    const Toast = Swal.mixin({
            toast: true,
            position: "bottom-left",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            } 
        });

    $(document).ready(function(){
        $('.delete-item').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "آیا از حذف مطمئن هستید؟",
                text: "بعد از حذف معلومات مورد نظر به هیچ عنوان قابل برگشت نیست.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "بله, مطمئن هستم.",
                cancelButtonText: "لغو",
                }).then((result) => {
                if (result.isConfirmed) {
                    let url = $(this).attr('href');
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function(data) {
                            if (data.status === 'success') {
                                Swal.fire(
                                    'حذف صورت گرفت.',
                                    data.message,
                                    'success'
                                )
                                window.location.reload();
                            } else if (data.status === 'error') {
                                Swal.fire(
                                    'Error!',
                                    data.message,
                                    'error'
                                )
                            }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                    });
                }
                });
        });
    });

</script>
@stack('scripts')

