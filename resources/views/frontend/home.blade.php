@extends('frontend.config')

@section('content')
<?php
$dname = $dashboard->name;
$name = explode(' ',$dname);


?>
        <!-- Start Hero -->
            <section class="bg-home personal-hero d-flex align-items-center background-effect overflow-hidden" id="home">
                <div class="container-fluid">
                    <div class="bg-overlay bg-soft-primary jarallax" data-jarallax data-speed="0.5" style="background: url('{{ asset('uploads/dashboard') }}/{{ $dashboard->image }}') top;"></div>

                    <div class="container position-relative z-index-1">
                        <div class="row mt-5">
                            <div class="col">
                                <div class="title-heading">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 order-2 order-lg-1 mt-4 mt-sm-0">
                                            <div class="rounded personal-hero-para">
                                                <h5 class="mb-3 sub-title">{{ $dashboard->careerTitle }}</h5>

                                                <p class="para-desc para mb-0">{{ $dashboard->careerDescription }}</p>

                                                <div class="mt-4">
                                                    <a href="#portfolio" class="btn btn-primary">Hire me</a>
                                                </div>
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-4 offset-lg-4 col-md-6 order-1 order-lg-1">
                                            <h4 class="display-3 title fw-bold mb-0">{{ $name[0] }}<br> {{ substr($name[1],0,1) }}<span class="typewrite" data-period="2000" data-type='[ "{{ substr($name[1],1,20) }}!"]'></span> </h4>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!--end container-->
                </div><!--end container fluid-->
                <div class="personal-overlay bg-overlay bg-primary-gradient-overlay"></div>
                <ul class="circles p-0 mb-0"><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li></ul>
            </section><!--end section-->
            <!-- Shape Start -->
            <div class="position-relative">
                <div class="position-absolute top-100 start-50 translate-middle z-index-1">
                    <a href="#about" class="btn btn-icon btn-pills btn-lg btn-light"><i data-feather="arrow-down" class="icons"></i></a>
                </div>
            </div>
            <!--Shape End-->

            <!-- Partners start -->
            <div class="container pt-5">
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-2 col-6 py-2">
                        <div class="text-center">
                            <img src="assets/images/client/amazon.svg" class="avatar avatar-ex-sm" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 py-2">
                        <div class="text-center">
                            <img src="assets/images/client/google.svg" class="avatar avatar-ex-sm" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 py-2">
                        <div class="text-center">
                            <img src="assets/images/client/lenovo.svg" class="avatar avatar-ex-sm" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 py-2">
                        <div class="text-center">
                            <img src="assets/images/client/paypal.svg" class="avatar avatar-ex-sm" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 py-2">
                        <div class="text-center">
                            <img src="assets/images/client/shopify.svg" class="avatar avatar-ex-sm" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-2 col-6 py-2">
                        <div class="text-center">
                            <img src="assets/images/client/spotify.svg" class="avatar avatar-ex-sm" alt="">
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
            <!-- Partners End -->

            <!-- Start -->
            <section class="section" id="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="position-relative">
                                <img src="{{ asset('uploads/about') }}/{{ $abouts->image }}" class="rounded-pill shadow img-fluid" alt="">

                                <div class="position-absolute top-0 start-0 z-index-m-1">
                                    <img src="assets/images/shapes/dots.svg" class="avatar avatar-xl-large" alt="">
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-7 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0">
                            <div class="ms-lg-5">
                                <div class="section-title">
                                    <span class="badge rounded-pill bg-soft-primary">About Me</span>
                                    <h4 class="title mt-2 mb-4">{{ $abouts->title }}</h4>
                                    <p class="para-desc text-muted pb-0">{{ $abouts->description }}</p>
                                </div>
                                @forelse ($skills as $skill)
                                    <div class="progress-box mt-4">
                                        <h6 class="title fw-normal text-muted">{{ $skill->name }}</h6>
                                        <div class="progress">
                                            <div class="progress-bar position-relative bg-primary" style="width:{{ $skill->percentage }}%;">
                                                <div class="progress-value d-block text-muted h6">{{ $skill->percentage }}%</div>
                                            </div>
                                        </div>
                                    </div><!--end process box-->
                                @empty
                                    <div class="progress-box mt-4">
                                        <h6 class="title fw-normal text-muted">Working On it</h6>
                                    </div><!--end process box-->
                                @endforelse


                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- End -->

            <!-- Start -->
            <section class="section bg-light" id="features">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="section-title text-center mb-4 pb-2">
                                <h4 class="title mb-4">What do i offer ?</h4>
                                <p class="para-desc text-muted mx-auto mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        @forelse ($services as $service)
                            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                                <div class="card border-0 text-center features feature-primary feature-clean course-feature p-4 overflow-hidden shadow">
                                    <div class="icons text-center mx-auto">
                                        <i class="{{ $service->icon }}"></i>
                                    </div>
                                    <div class="content mt-4">
                                        <h5>{{ $service->offerTitle }}</h5>
                                        <p class="text-muted mt-3">{{ $service->offerDescription }}</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        @empty
                            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                                <h3>Woeking On It</h3>
                            </div>
                        @endforelse


                    </div><!--end row-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- End -->

            <!-- Resume Start -->
            <section class="section" id="experience">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center">
                            <div class="section-title mb-4 pb-2">
                                <div class="position-relative">
                                    <h4 class="title mb-4">Work Experience</h4>
                                </div>
                                <p class="text-muted mx-auto para-desc mb-0">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-12 mt-4 pt-2">
                            <div class="timeline-page position-relative">
                                @forelse ($experiences as $experience)
                                <div class="timeline-item">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="duration date-label-left position-relative text-md-end">
                                                <img src="{{ asset('uploads/experience') }}/{{ $experience->logo }}" class="rounded-pill avatar avatar-ex-small" alt="">
                                                <h5 class="my-2">S{{ $experience->name }}</h5>
                                                <small class="text-muted mb-0">{{ $experience->startingDate->format('Y') }} - <span class="{{ $experience->endDate == null? 'badge bg-secondary':'' }}">{{ $experience->endDate == null? 'Working':$experience->endDate->format('Y') }}</span></small>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-6 col-md-6 col-sm-6 mt-4 mt-sm-0">
                                            <div class="event event-description-right float-left text-start">
                                                <h6 class="title mb-1 text-capitalize">{{ $experience->title }}</h6>
                                                <p class="timeline-subtitle mt-3 mb-0 text-muted">{{ $experience->description }}</p>
                                            </div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </div><!--end timeline item-->
                                @empty
                                <div class="timeline-item">
                                    <h3>No Data</h3>
                                </div><!--end timeline item-->
                                @endforelse


                            </div><!--end timeline page-->
                            <!-- TIMELINE END -->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- Resume End -->

            <!-- Start Cta -->
            {{-- <section class="py-5 jarallax" data-jarallax data-speed="0.5" style="background: url('assets/images/personal/cta.jpg');">
                <div class="bg-overlay bg-primary-gradient-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="section-title">
                                <h4 class="text-light title-dark title mb-2">I Am Available For Freelancer Projects.</h4>
                                <p class="text-light title-dark mx-auto mb-0 para-desc">Obviously I'm a Web Designer. Experienced with all stages of the development cycle for dynamic web projects.</p>
                                <div class="mt-4 pt-2">
                                    <a href="#contact" class="btn btn-warning mouse-down">Hire me <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down fea icon-sm"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- End Cta -->

            <!-- Start Work -->
            <section class="section bg-light" id="project">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="section-title text-center mb-4 pb-2">
                                <h4 class="title mb-4">My Projects</h4>
                                <p class="para-desc text-muted mx-auto mb-0">I've worked at local market on a range of different projects, including design systems, websites and apps.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row justify-content-center">
                        <div class="col-12 mb-4 filters-group-wrap">
                            <div class="filters-group">
                                <ul class="container-filter list-inline mb-0 filter-options text-center">
                                    <li class="list-inline-item categories-name border text-dark rounded active" data-group="all">All</li>
                                    @forelse ($category as $cats)
                                    <li class="list-inline-item categories-name border text-dark rounded" data-group="{{ $cats->name }}">{{ $cats->name }}</li>
                                    @empty
                                    @endforelse

                                </ul>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div id="grid" class="row">
                        @forelse ($projects as $project)
                        <div class="col-lg-3 col-md-6 col-12 spacing picture-item" data-groups='["{{ $project->rel_to_cat->name }}"]'>
                            <div class="card border-0 work-container work-primary work-modern position-relative d-block overflow-hidden rounded">
                                <div class="card-body p-0">
                                    <img src="{{ asset('uploads/project') }}/{{ $project->photo }}" class="img-fluid" alt="work-image">
                                    <div class="overlay-work"></div>
                                    <div class="content">
                                        <h5 class="mb-1"><a href="{{ route('single.project',$project->id) }}" class="text-white title">{{ $project->title }}</a></h5>
                                        <h6 class="text-white-50 tag mt-1 mb-0">{{ $project->rel_to_cat->name }}</h6>
                                    </div>
                                    <div class="icons text-center">
                                        <a href="{{ asset('uploads/project') }}/{{ $project->photo }}" class="work-icon bg-white d-inline-flex rounded-pill lightbox"><i data-feather="camera" class="fea icon-sm image-icon"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        @empty
                        <div class="col-lg-3 col-md-6 col-12 spacing picture-item" data-groups='["designing"]'>
                            <h3>Data not found</h3>
                        </div><!--end col-->
                        @endforelse



                    </div><!--end row-->

                    <div class="row justify-content-center">
                        <div class="col-12 mt-4 pt-2">
                            <div class="text-center">
                                <a href="{{ route('all.project') }}" class="text-primary h6 mb-0">See More <span class="h5 mb-0 ms-1"><i class="uil uil-arrow-right align-middle"></i></span></a>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- End work -->

            <!-- Start Contact -->
            <section class="section" id="contact">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="section-title text-center mb-4 pb-2">
                                <h4 class="title mb-4">Get In Touch!</h4>
                                <p class="para-desc text-muted mx-auto mb-0">what you require to hire me, so that i can find the most suitable solution for your needs.</p>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-6 col-12 mt-4 pt-2">
                            <div class="card rounded shadow">
                                <div class="card-body">
                                    <form method="POST" action="{{ route('message.store') }}">
                                        @csrf
                                        <p class="mb-0" id="error-msg"></p>
                                        <div id="simple-msg"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Name <span class="text-danger">*</span></label>
                                                    <input name="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name :">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                    <input name="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email :">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Subject</label>
                                                    <input name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject :">
                                                </div>
                                            </div><!--end col-->

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Comments <span class="text-danger">*</span></label>
                                                    <textarea name="comments" id="comments" rows="4" class="form-control @error('comments') is-invalid @enderror" placeholder="Message :"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="submit" name="send" class="btn btn-primary">Send Message</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-5 col-md-6 col-12 mt-4 pt-2">
                            @forelse ($contacts as $contact)
                                <div class="ms-lg-4">
                                    <div class="d-flex features feature-primary feature-clean">
                                        <div class="icons text-center mx-auto">
                                            <i class="{{ $contact->icon }}"></i>
                                        </div>

                                        <div class="flex-1 ms-3">
                                            <h5 class="mb-2">{{ $contact->title }}</h5>
                                            <p class="text-muted mb-2">{{ $contact->information }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>Data not found !</h3>
                            @endforelse
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end container-->
            </section><!--end section-->
            <!-- End Contact -->

@endsection
@section('script')
    @if (session('succ'))
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
            title: '{{ session('succ') }}'
            })
        </script>
    @endif
    @error('email')
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
        icon: 'info',
        title: 'Already Subscribed'
        })
    </script>
    @enderror
@endsection
