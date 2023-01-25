@extends('backend.config')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Edit Dashboard</h5>
                    <a href="{{ route('dashboard.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> List</a>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    @if ($data->status == 0)
                                    Status : <span class="badge bg-danger">Deactived</span>
                                    @else
                                    Status : <span class="badge bg-primary">Actived</span>
                                    @endif
                                </td>
                                <td>
                                    Create : <span class="badge bg-primary"> {{ $data->created_at->diffForHumans() }}</span>
                                </td>
                                <td>
                                    Update : <span class="badge bg-warning"> {{ $data->updated_at->diffForHumans() }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{ $data->name }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Career
                                Title</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('careerTitle') is-invalid @enderror" type="text" placeholder="Career Title"
                                name="careerTitle" value="{{ $data->careerTitle }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Career
                                Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('careerDescription') is-invalid @enderror" type="text" placeholder="Career Description"
                                name="careerDescription">{{ $data->careerDescription }}</textarea>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center" data-select2-id="select2-data-45-rl86">
                            <select class="js-example-basic-single w-100 select2-hidden-accessible" name="status" data-select2-id="select2-data-16-a569" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-18-ljb5" value="1" {{ ($data->status==1?'selected':'') }} >Active</option>
                                <option data-select2-id="select2-data-50-3zl0" value="0" {{ ($data->status==1?'':'selected') }} >Deactive</option>
                            </select>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <img style="width: 150px" src="{{ asset('uploads/dashboard') }}/{{ $data->image }}" alt="Profile">
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
                            <button class="btn btn-solid" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
