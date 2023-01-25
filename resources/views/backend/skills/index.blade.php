@extends('backend.config')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Skills</h5>
                    <a href="{{ route('skills.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> list</a>
                </div>

                <div class="card-body">
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('skills.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Percentage</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('percentage') is-invalid @enderror" type="number" placeholder="%" name="percentage" value="{{ old('percentage') }}" min="1" max="100">
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
                                <h6>Skills</h6>
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
