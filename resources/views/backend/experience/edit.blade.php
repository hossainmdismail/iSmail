@extends('backend.config')
@section('content')
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="card-header-2 d-flex justify-content-between">
                    <h5>Experience About</h5>
                    <a href="{{ route('experience.manage') }}" class="align-middle"> <i class="ri-settings-line"></i> List</a>
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
                                    Update : <span class="badge bg-warning"> {{ ($data->updated_at == null? 'New':$data->updated_at->diffForHumans()) }}</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <form class="theme-form theme-form-2 mega-form" action="{{ route('experience.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Company Name</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Google ltd.." name="name" value="{{ $data->name }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Job Title</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('title') is-invalid @enderror" type="text" placeholder="Artist.." name="title" value="{{ $data->title }}">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control @error('description') is-invalid @enderror" type="text" placeholder="Description"
                                name="description">{{ $data->description }}</textarea>
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">Starting Date</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('startingDate') is-invalid @enderror" type="date"
                                name="startingDate" value="{{ $data->startingDate->format('Y-m-d') }}" min="1970-01-01" max="2023-12-31">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center">
                            <label class="form-label-title col-sm-3 mb-0">End Date</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('endDate') is-invalid @enderror" type="date"
                                name="endDate" value="{{ $data->endDate == null?'':$data->endDate->format('Y-m-d') }}" min="1970-01-01" max="2023-12-31">
                            </div>
                        </div>

                        <div class="mb-4 row align-items-center" data-select2-id="select2-data-45-rl86">
                            <select class="js-example-basic-single w-100 select2-hidden-accessible" name="status" data-select2-id="select2-data-16-a569" tabindex="-1" aria-hidden="true">
                                <option data-select2-id="select2-data-18-ljb5" value="1" {{ ($data->status==1?'selected':'') }} >Active</option>
                                <option data-select2-id="select2-data-50-3zl0" value="0" {{ ($data->status==1?'':'selected') }} >Deactive</option>
                            </select>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <img style="width: 150px" src="{{ asset('uploads/experience') }}/{{ $data->logo }}" alt="Profile">
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
