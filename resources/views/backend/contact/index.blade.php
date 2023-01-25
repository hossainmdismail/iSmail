@extends('backend.config')

@section('content')
<?php
$icon = array(
    'fa-solid fa-display',
    'fa-solid fa-mobile-screen-button',
    'fa-solid fa-camera',
    'fa-solid fa-chart-pie',
    'fa-solid fa-solid fa-shield-halved',
    'fa-solid fa-headset',
);

?>

<div class="row">
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Contact</h5>
                    <a href="{{ route('contact.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> list</a>
                </div>

                <div class="card-body">
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 d-flex">
                            @foreach ($icon as $icons)
                            <i class="{{ $icons }} icon" style="font-size: 24px;padding: 12px;margin: 2px;cursor: pointer;"></i>
                            @endforeach
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Icon</label>
                            <div class="col-sm-9">
                                <input id="iconFild" class="form-control @error('icon') is-invalid @enderror" type="text" placeholder="Click Icon" name="icon" value="{{ old('icon') }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Title</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Title" name="title" value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Information</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('information') is-invalid @enderror" type="text" placeholder="Information" name="information">{{ old('information') }}</textarea>
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
                                <h6>Service</h6>
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
<script>
    $('.icon').click(function(){
        var dd = $(this).attr('class');
        $('#iconFild').val(dd);
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
