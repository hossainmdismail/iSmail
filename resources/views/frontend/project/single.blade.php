@extends('frontend.config')
@section('content')

<section class="bg-half-170 bg-light d-table w-100">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="pages-heading">
                    <h4 class="title">{{ $project->title }}</h4>
                    <ul class="list-unstyled mt-4 mb-0">
                        <li class="list-inline-item h6 user text-muted me-2"> <span class="text-dark">Client :</span> {{ $project->clientName }}</li>
                        <li class="list-inline-item h6 date text-muted"> <span class="text-dark">Date : </span>{{ $project->startingDate->format('d-M-y') }} | <span style="background: #f7972038" class="badge badge-secondary text-black">{{ $project->endDate == null? 'Working':'Complete' }}</span></li>
                    </ul>
                </div>
            </div>  <!--end col-->
        </div><!--end row-->

        <div class="position-breadcrumb">
            <nav aria-label="breadcrumb" class="d-inline-block">
                <ul class="breadcrumb rounded shadow mb-0 px-4 py-2">
                    <li class="breadcrumb-item"><a href="{{ route('all.project') }}">All Project</a></li>
                    <li class="breadcrumb-item">Single</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
                </ul>
            </nav>
        </div>
    </div> <!--end container-->
</section>




<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <img src="{{ asset('uploads/project') }}/{{ $project->thumbnail }}" class="img-fluid rounded" alt="">
            </div>

            <div class="col-md-10 mt-4 pt-2">
                <div class="bg-light rounded p-4">
                    <p class="text-muted fst-italic mb-0">"{{ $project->shortDescription }}"</p>
                </div>
                <div class="bg-light rounded p-4 mt-4 pt-2">
                    {!! $project->longDescription !!}
                </div>
                {{-- <div class="bg-light rounded p-4 mt-4 pt-2">
                    <p class="text-muted fst-italic mb-0">" There is now an abundance of readable dummy texts. These are usually used when a text is required purely to fill a space. These alternatives to the classic Lorem Ipsum texts are often amusing and tell short, funny or nonsensical stories. "</p>

                    <ul class="list-unstyled text-muted mt-4">
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented &amp; Experienced Marketing Agency</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Create your own skin to match your brand</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Digital Marketing Solutions for Tomorrow</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Our Talented &amp; Experienced Marketing Agency</li>
                    </ul>
                </div> --}}

                <div class="row align-items-center">
                    <div class="col-lg-6 mt-4 pt-2">
                        <div class="card work-details rounded bg-light border-0">
                            <div class="card-body">
                                <h5 class="card-title border-bottom pb-3 mb-3">Project Info :</h5>
                                <dl class="row mb-0">
                                    <dt class="col-md-4 col-5">Client :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{ $project->clientName }}</dd>

                                    <dt class="col-md-4 col-5">Category :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{ $project->rel_to_cat->name }}</dd>

                                    <dt class="col-md-4 col-5">Date :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{ $project->startingDate->format('d-M-Y') }}</dd>

                                    <dt class="col-md-4 col-5">Status :</dt>
                                    <dd class="col-md-8 col-7 text-muted"><span style="background: #f7972038" class="badge badge-secondary text-black">{{ $project->endDate == null? 'Working':'Complete' }}</span></dd>

                                    @if ($project->website == null)
                                    @else
                                    <dt class="col-md-4 col-5">Website :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{ $project->website }}</dd>
                                    @endif


                                    <dt class="col-md-4 col-5">Location :</dt>
                                    <dd class="col-md-8 col-7 text-muted">{{ $project->location }}</dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 mt-4 pt-2">
                        <img src="assets/images/work/6.jpg" class="img-fluid rounded" alt="">
                    </div>
                </div>

                <!-- Comment Areas start -->
                {{-- <div class="card shadow rounded border-0 mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Comments :</h5>

                        <ul class="media-list list-unstyled mb-0">
                            <li class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a class="pe-3" href="#">
                                            <img src="assets/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                        </a>
                                        <div class="flex-1 commentor-detail">
                                            <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                            <small class="text-muted">15th August, 2021 at 01:25 pm</small>
                                        </div>
                                    </div>
                                    <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                </div>
                            </li>

                            <li class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a class="pe-3" href="#">
                                            <img src="assets/images/client/02.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                        </a>
                                        <div class="flex-1 commentor-detail">
                                            <h6 class="mb-0"><a href="javascript:void(0)" class="media-heading text-dark">Tammy Camacho</a></h6>
                                            <small class="text-muted">15th August, 2021 at 05:44 pm</small>
                                        </div>
                                    </div>
                                    <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                </div>
                            </li>

                            <li class="mt-4">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <a class="pe-3" href="#">
                                            <img src="assets/images/client/03.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                        </a>
                                        <div class="flex-1 commentor-detail">
                                            <h6 class="mb-0"><a href="javascript:void(0)" class="media-heading text-dark">Tammy Camacho</a></h6>
                                            <small class="text-muted">16th August, 2021 at 03:44 pm</small>
                                        </div>
                                    </div>
                                    <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                </div>
                                <div class="mt-3">
                                    <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                </div>

                                <ul class="list-unstyled ps-4 ps-md-5 sub-comment">
                                    <li class="mt-4">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <a class="pe-3" href="#">
                                                    <img src="assets/images/client/01.jpg" class="img-fluid avatar avatar-md-sm rounded-circle shadow" alt="img">
                                                </a>
                                                <div class="flex-1 commentor-detail">
                                                    <h6 class="mb-0"><a href="javascript:void(0)" class="text-dark media-heading">Lorenzo Peterson</a></h6>
                                                    <small class="text-muted">17th August, 2021 at 01:25 pm</small>
                                                </div>
                                            </div>
                                            <a href="#" class="text-muted"><i class="mdi mdi-reply"></i> Reply</a>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted fst-italic p-3 bg-light rounded">" There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour "</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> --}}

                <!-- Comments -->
                {{-- <div class="card shadow rounded border-0 mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-0">Leave A Comment :</h5>

                        <form class="mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Your Comment</label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            <textarea id="message" placeholder="Your Comment" rows="5" name="message" class="form-control ps-5" required=""></textarea>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control ps-5" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <input id="email" type="email" placeholder="Email" name="email" class="form-control ps-5" required="">
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-md-12">
                                    <div class="send d-grid">
                                        <button type="submit" class="btn btn-primary">Send Comment</button>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection
