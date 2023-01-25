@extends('backend.config')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>View Notification</h5>
                    <a href="{{ route('message.link') }}" class="align-middle"> <i class="fas fa-long-arrow-alt-left"></i> Back</a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    @if ($data->seen == 0)
                                    Status : <span class="border border-primary rounded px-2">Read</span>
                                    @else
                                    Status : <span class="badge bg-primary">Unread</span>
                                    @endif
                                </td>
                                <td>
                                    Sent at : <span class="badge bg-primary"> {{ $data->created_at->diffForHumans() }}</span>
                                </td>
                                <td>
                                    Seen at : <span class="badge bg-warning"> {{ ($data->updated_at == null? 'New':$data->updated_at->diffForHumans()) }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <form class="theme-form theme-form-2 mega-form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control" value="{{ $data->name }}" readonly>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Email</label>
                            <div class="col-sm-9">
                                <input class="form-control"  readonly value="{{ $data->email }}">
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Subject</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  readonly>{{ $data->subject }}</textarea>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Comments</label>
                            <div class="col-sm-9">
                                <textarea class="form-control"  readonly>{{ $data->comments }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
