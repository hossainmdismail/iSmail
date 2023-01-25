@extends('backend.config')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Project</h5>
                    <a href="{{ route('project.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> list</a>
                </div>

                <div class="card-body">
                    <div class="mb-4 row align-items-center">
                        <a class="btn btn-solid" href="{{ route('category.link') }}">Add Category</a>
                    </div>
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-choose @error('image') is-invalid @enderror" name="image" type="file" id="formFile" multiple="">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Thumbnail</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-choose @error('thumbnail') is-invalid @enderror" name="thumbnail" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center" data-select2-id="select2-data-41-3u94">
                            <label class="col-sm-3 col-form-label form-label-title">Category</label>
                            <div class="col-sm-9" data-select2-id="select2-data-40-kn44">
                                <select class="js-example-basic-single w-100 select2-hidden-accessible" name="categoryId">
                                    <option disabled="">Category Menu</option>
                                    @foreach ($cat as $cats)
                                    <option value="{{ $cats->id }}">{{ $cats->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Title</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Project Title" name="title">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Client Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('clientName') is-invalid @enderror" type="text" placeholder="Name" name="clientName">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Starting Date</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('startingDate') is-invalid @enderror" type="date"
                                name="startingDate" min="1970-01-01" max="2023-12-31">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">End Date</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('endDate') is-invalid @enderror" type="date"
                                name="endDate" min="1970-01-01" max="2023-12-31">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Location</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('location') is-invalid @enderror" type="text" placeholder="usa" name="location">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Website</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('website') is-invalid @enderror" type="text" placeholder="example.com" name="website">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Short Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('shortDescription') is-invalid @enderror" type="text" placeholder="Short Description"
                                name="shortDescription"></textarea>
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Long Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="60" id="summernote" @error('longDescription') is-invalid @enderror"
                                name="longDescription"></textarea>
                            </div>
                        </div>




                        <div class="mb-4 row align-items-center">
                            <button class="btn btn-solid" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@if (session('add'))
<script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '{{ session('add') }}',
    })
</script>
@endif
@endsection
