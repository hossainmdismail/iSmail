@extends('backend.config')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="title-header option-title">
                    <h5>Notification</h5>

                </div>
                 <div class="table-responsive category-table">
                    <table class="table all-package theme-table dataTable no-footer" id="table_id" aria-describedby="table_id_info">
                        <thead>
                            <tr>
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Product Name: activate to sort column descending" style="width: 66.8906px;">
                                    Mail
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Icon: activate to sort column ascending" style="width: 66.8906px;">
                                    Status
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="table_id" rowspan="1" colspan="1" aria-label="Option: activate to sort column ascending" style="width: 66.9219px;">
                                    Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $today = date('d-m-Y');
                            ?>
                            @forelse ($data as $datas)
                            <tr class="odd">

                                <td class="sorting_1">{{ $datas->email }}</td>
                                <td>
                                @if ($datas->created_at->format('d-m-Y') == $today)
                                <span class="badge bg-warning">New</span>
                                @else
                                {{-- <span class="badge bg-warning">Unread</span> <br> --}}
                                @endif
                                {{ $datas->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                        <span class="text-secondary ">No Data Fount ! </span>
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
