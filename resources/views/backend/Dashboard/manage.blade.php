@extends('backend.config')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>Dashboard List</h5>
                    <form class="d-inline-flex">
                        <a href="{{ route('dashboard.link') }}" class="align-items-center btn btn-theme">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>Add New
                        </a>
                    </form>
                </div>
                <div class="table-responsive category-table">
                    <table class="table all-package theme-table dataTable no-footer" id="table_id" aria-describedby="table_id_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 66.8906px;">
                                    Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 66.8906px;">
                                    Date
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Product Image: activate to sort column ascending" style="width: 66.8906px;">
                                    Product Image
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Icon: activate to sort column ascending" style="width: 66.8906px;">
                                    Title
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Slug: activate to sort column ascending" style="width: 66.8906px;">
                                    Description
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Option: activate to sort column ascending" style="width: 66.9219px;">
                                    Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($data as $datas)
                            <tr class="odd">

                                <td class="sorting_1">{{ $datas->name }}</td>

                                <td>
                                    @if ($datas->status == 0)

                                    <span class="badge bg-danger">Deactived</span> <br>
                                    @endif
                                    {{ $datas->created_at->diffForHumans() }}
                                </td>

                                <td>
                                    <div class="table-image">
                                        <img src="{{ asset('uploads/dashboard') }}/{{ $datas->image }}" class="img-fluid" alt="">
                                    </div>
                                </td>

                                <td>{{ $datas->careerTitle }}</td>

                                <td>{{Str::substr($datas->careerDescription, 0, 20)  }}...</td>

                                <td>
                                    <ul>
                                        <li>
                                            <a href="{{ route('dashboard.edit',$datas->id) }}">
                                                <i class="ri-pencil-line"></i>
                                            </a>
                                        </li>

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
                                                            <a href="{{ route('dashboard.delete',$datas->id) }}" class="btn btn-animation btn-md fw-bold">Yes</a>
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
                        <span class="text-secondary ">No Data Fount ! <a href="{{ route('dashboard.link') }}">Add New</a> </span>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    @if (session('del'))
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
                title: '{{ session('del') }}',
            })
        </script>
    @endif
    @if (session('up'))
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
                title: '{{ session('up') }}',
            })
        </script>
    @endif
@endsection
