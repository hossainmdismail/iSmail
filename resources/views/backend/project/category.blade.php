@extends('backend.config')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Add Category</h5>
                    <a href="{{ route('project.link') }}" class="align-middle"> <i class="ri-settings-line"></i> Back</a>
                </div>

                <div class="card-body">
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Google ltd.." name="name">
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
    <div class="col-lg-6">
        <div class="card">
            <table class="table all-package theme-table dataTable no-footer" id="table_id" aria-describedby="table_id_info">
                <thead>
                    <tr>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 66.8906px;">
                            id
                        </th>
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 66.8906px;">
                            Name
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Icon: activate to sort column ascending" style="width: 66.8906px;">
                            Date
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Option: activate to sort column ascending" style="width: 66.9219px;">
                            Option</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $datas)
                    <tr class="odd">

                        <td class="sorting_1">{{ $datas->id }}</td>

                        <td>{{$datas->name}}</td>

                        <td>
                            {{ $datas->created_at->diffForHumans() }}
                        </td>


                        <td>
                            <ul>
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                                        <i class="ri-delete-bin-line"></i>
                                    </a>
                                    {{-- Models --}}
                                    <div class="modal fade theme-modal remove-coupon show" id="exampleModalToggle" tabindex="-1" aria-modal="true" role="dialog" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header d-none text-center">
                                                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="remove-box">
                                                        <p>This action will remove the selected data ! <br><span style="color:red">Do you really want to Delete ?</span></p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                                                    <a href="{{ route('category.delete',$datas->id) }}" class="btn btn-animation btn-md fw-bold">Yes</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Models --}}
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                <span class="text-secondary ">No Data Fount ! <a href="{{ route('experience.link') }}">Add New</a> </span>
                @endforelse
                </tbody>
            </table>
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
