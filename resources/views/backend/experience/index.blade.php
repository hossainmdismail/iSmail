@extends('backend.config')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Experience</h5>
                    <a href="{{ route('experience.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> list</a>
                </div>

                <div class="card-body">
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Company Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Google ltd.." name="name">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Job Title</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Artist.." name="title">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('description') is-invalid @enderror" type="text" placeholder="Description"
                                name="description"></textarea>
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
                            <div class="mb-4 row align-items-center">
                                <label class="col-sm-3 col-form-label form-label-title">Images</label>
                                <div class="col-sm-9">
                                    <input class="form-control form-choose @error('image') is-invalid @enderror" name="image" type="file" id="formFile" multiple="">
                                </div>
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
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2">
                    <h3>Status</h3>
                </div>

                <div class="card-body">
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <h6>Experience</h6>
                                <h4>{{ $count }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <h6>Active</h6>
                                <h4>{{ $active }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
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
