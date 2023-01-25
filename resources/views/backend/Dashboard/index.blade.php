@extends('backend.config')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Dashboard</h5>
                    <a href="{{ route('dashboard.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> list</a>
                </div>

                <div class="card-body">
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">First Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('fname') is-invalid @enderror" type="text" placeholder="First Name" name="fname" value="{{ old('fname') }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Last
                                Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('lname') is-invalid @enderror" type="text" placeholder="Last Name" name="lname" value="{{ old('lname') }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Career
                                Title</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('careerTitle') is-invalid @enderror" type="text" placeholder="Career Title"
                                name="careerTitle" value="{{ old('careerTitle') }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Career
                                Description</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('careerDescription') is-invalid @enderror" type="text" placeholder="Career Description"
                                name="careerDescription" value="{{ old('careerDescription') }}">
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
                                <h6>Dashboard</h6>
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
