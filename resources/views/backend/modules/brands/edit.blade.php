@component('backend.includes.content' , ['title' => 'Edit brand'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('backend.index') }}">Admin Panel</a></li>
        <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Edit brands</a></li>
        <li class="breadcrumb-item active">Edit brand</li>
    @endslot
    @section('page_title')
        Edit brand
    @endsection

    <div class="row">
        <div class="col-lg-12">
            @include('backend.includes.errors')
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Edit brand</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>
                            <input type="text" name="title" class="form-control" id="backgtitleround_image_header" placeholder="First brand Title" value="{{ old('title', $brand->title) }}">
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="image">Image brand</label>
                                        <input type="file" class="form-control" name="image" placeholder="Please Select Image">
                                    </div>
                                    <div class="col-md-6">
                                        <br>
                                        <img src="{{ URL::asset($brand->image) }}" alt="{{ $brand->title }}" style="width: 100px; height:50px;">
                                        <input type="hidden" name="oldimage" value="{{ $brand->image }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit brand</button>
                        <a href="{{ route('brands.index') }}" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>
@endcomponent
