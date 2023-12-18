@extends('frontend.layouts.master')

@section('content')
    <!-- Breadcrumb Area -->
    <div class="tm-breadcrumb-area tm-padding-section bg-grey" data-bgimage="{{ URL::asset($system_setting->banner) }}"
    data-white-overlay="2">
    <div class="container">
        <div class="tm-breadcrumb">
            <h2 class="text-white">همه لیسه ها</h2>
            <ul>
                <li class="text-white"><a href="{{ route('home_page') }}" class="text-white">خانه</a></li>
                <li class="text-white" class="text-white">لیسه ها</li>
            </ul>
        </div>
    </div>
</div>
<!--// Breadcrumb Area -->


<!-- Page Content -->
<main class="page-content">

    <!-- Blogs Area -->
    <div class="tm-section tm-blog-area tm-padding-section bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row mt-50-reverse">
                        <!-- Blog Single Item -->
                        @php($i = 1)
                            <!--Table-->
                            <table class="table table-striped h-auto">
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام لیسه</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schools as $school)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $school->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <!--Table body-->
                            </table>
                        <!--// Blog Single Item -->
                    </div>
                    <div class="tm-pagination mt-50">
                        {{ $schools->links('vendor.pagination.custom') }}
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Blogs Area -->
</main>
<!--// Page Content -->
@endsection