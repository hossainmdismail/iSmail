@extends('frontend.config')
@section('content')
{{-- Header Section --}}
<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h4 class="title mb-0"> Work Modern </h4>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ route('all.project') }}">All Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page"">View</li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section>

{{-- Main Body --}}
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 filters-group-wrap">
                <div class="filters-group">
                    <ul class="container-filter list-inline mb-0 filter-options text-center">
                        <li class="list-inline-item categories-name border text-dark rounded active" data-group="all">All</li>
                        @forelse ($cat as $cats)
                        <li class="list-inline-item categories-name border text-dark rounded" data-group="{{ $cats->name }}">{{ $cats->name }}</li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div id="grid" class="row shuffle" style="position: relative; overflow: hidden; height: 1076.69px; transition: height 250ms cubic-bezier(0.4, 0, 0.2, 1) 0s;">
            @forelse ($projects as $project)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 picture-item shuffle-item shuffle-item--visible" data-groups='["{{ $project->rel_to_cat->name }}"]' style="position: absolute; top: 0px; visibility: visible; will-change: transform; left: 0px; opacity: 1; transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity; transform: translate(0px, 0px) scale(1);">
                <div class="card work-container work-primary work-modern position-relative overflow-hidden shadow rounded border-0">
                    <div class="card-body p-0">
                        <img src="{{ asset('uploads/project') }}/{{ $project->photo }}" class="img-fluid rounded" alt="work-image">
                        <div class="overlay-work"></div>
                        <div class="content">
                            <a href="{{ route('single.project',$project->id) }}" class="title text-white d-block fw-bold">{{ $project->title }}</a>
                            <small class="text-white-50">{{ $project->rel_to_cat->name }}</small>
                        </div>
                        <div class="client">
                            <small class="user d-block"><i class="uil uil-user"></i> {{ $project->clientName }}</small>
                            <small class="date"><i class="muil uil-calendar-alt"></i> {{ $project->startingDate->format('d-M-Y') }}</small>
                        </div>
                    </div>
                </div>
            </div><!--end col-->
            @empty
                <h3>Data Not Found !</h3>
            @endforelse



        </div><!--end row-->

        <div class="row">
            <!-- PAGINATION START -->
            <div class="col-12 mt-4 pt-2">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Previous">Prev</a></li>
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript:void(0)" aria-label="Next">Next</a></li>
                </ul>
            </div><!--end col-->
            <!-- PAGINATION END -->
        </div><!--end row-->
    </div><!--end container-->
</section>
@endsection
