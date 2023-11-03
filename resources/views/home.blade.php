@extends('layouts.app')

@section('content')
<!-- @if(auth()->check())
                    @if(auth()->user()->is_admin == 1)
                        <a href="{{url('/admin/home')}}">Admin</a>
                    @elseif(auth()->user()->is_admin == 2)
                        <a href="{{url('/manager/home')}}">Manager</a>
                    @else
                        <div class=”panel-heading”>Normal User</div>
                    @endif 
                @else           
                    
                @endif -->
<main class="main">
    <section class="section-box">
        <div class="banner-hero hero-2 hero-3">
            <div class="banner-inner">
                <div class="block-banner">
                    <h1 class="text-42 color-white wow animate__animated animate__fadeInUp">Pencari kerja <span
                            class="color-green">Seni Peran</span><br class="d-none d-lg-block">Pertama di Indonesia</h1>
                    <div class="font-lg font-regular color-white mt-20 wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">"Segera daftarkan diri Anda dan temukan pekerjaan yang sesuai dengan minat
                        Anda dengan mudah"</div>
                    <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                        <form action="/list-job" method="GET" class="search-form">                  
                        <input class="form-input input-keysearch mr-10" type="text" name="search" placeholder="Kata Kunci ">
                        <button type="submit" class="btn btn-default btn-find font-sm">Cari</button>
                        </form>      
                    </div>
                    <!-- <div class="list-tags-banner mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                        <strong>Popular Searches:</strong><a href="index-3.html#">Designer</a>, <a
                            href="index-3.html#">Web</a>, <a href="index-3.html#">IOS</a>, <a
                            href="index-3.html#">Developer</a>, <a href="index-3.html#">PHP</a>, <a
                            href="index-3.html#">Senior</a>, <a href="index-3.html#">Engineer</a></div>
                </div> -->
            </div>
            <div class="container mt-60">
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-4 swiper">
                        <div class="swiper-wrapper pb-25 pt-4">
                            <div class="swiper-slide hover-up"><a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox"
                                               width="50px" src="assets/imgs/page/home/film.png"></div>
                                        <div class="text-info-right">
                                            <h4>Film</h4>
                                            <p class="font-xs">{{$countFilmJobs}}<span> Jobs Available</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up"><a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox"
                                               width="50px" src="assets/imgs/page/home/short_film.png"></div>
                                        <div class="text-info-right">
                                            <h4>Film Pendek</h4>
                                            <p class="font-xs">{{$countShortFilmJobs}}<span> Jobs Available</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up"><a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox"
                                               width="50px" src="assets/imgs/page/home/theater.png"></div>
                                        <div class="text-info-right">
                                            <h4>Teater</h4>
                                            <p class="font-xs">{{$countTheaterJobs}}<span> Jobs Available</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up"><a href="jobs-list.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox"
                                               width="50px" src="assets/imgs/page/home/Advertising.png"></div>
                                        <div class="text-info-right">
                                            <h4>Iklan</h4>
                                            <p class="font-xs">{{$countAdvertisingJobs}}<span> Jobs Available</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-style-border"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-70">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Lowongan Terbaru</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Cari dan hubungi kandidat yang tepat dengan lebih cepat.</p>
                <div class="list-tabs mt-40">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="active" id="nav-tab-job-1" href="index-3.html#tab-job-1" data-bs-toggle="tab"
                                role="tab" aria-controls="tab-job-1" aria-selected="true"><img
                                    src="assets/imgs/page/home/film.png" alt="jobBox"> Film</a></li>
                        <li><a id="nav-tab-job-2" href="index-3.html#tab-job-2" data-bs-toggle="tab" role="tab"
                                aria-controls="tab-job-2" aria-selected="false"><img
                                    src="assets/imgs/page/home/short_film.png" alt="jobBox"> Film Pendek </a></li>
                        <li><a id="nav-tab-job-3" href="index-3.html#tab-job-3" data-bs-toggle="tab" role="tab"
                                aria-controls="tab-job-3" aria-selected="false"><img
                                    src="assets/imgs/page/home/theater.png" alt="jobBox"> Teater</a></li>
                        <li><a id="nav-tab-job-4" href="index-4.html#tab-job-4" data-bs-toggle="tab" role="tab"
                                aria-controls="tab-job-4" aria-selected="false"><img
                                    src="assets/imgs/page/home/Advertising.png" alt="jobBox"> Iklan</a></li>
                    </ul>
                </div>
            </div>                        
            <div class="mt-50">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
                        <div class="row">
                        @foreach($recentFilmJobs as $jobs)                                                                   
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">{{$jobs->name}}</a></h6>                                        
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">{{ $jobs->created_at->diffForHumans() }}</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Film</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                            <h6 class="color-brand-1" style="margin-top:5px;">{{$jobs->recruiter->name}}</h6>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="text-muted">Bandung, Indonesia</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            @endforeach
                        </div>
                    </div>
                    <!-- different -->
                    <div class="tab-pane fade" id="tab-job-2" role="tabpanel" aria-labelledby="tab-job-2">
                        <div class="row">
                        @foreach($recentShortFilmJobs as $jobs)                                                                   
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">{{$jobs->name}}</a></h6>                                        
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">{{ $jobs->created_at->diffForHumans() }}</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Film Pendek</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                            <h6 class="color-brand-1" style="margin-top:5px;">{{$jobs->recruiter->name}}</h6>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="text-muted">Bandung, Indonesia</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            @endforeach
                        </div>
                    </div>
                    <!-- Different Content  -->
                    <div class="tab-pane fade" id="tab-job-3" role="tabpanel" aria-labelledby="tab-job-3">
                        <div class="row">
                        @foreach($recentTheaterJobs as $jobs)                                                                   
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">{{$jobs->name}}</a></h6>                                        
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">{{ $jobs->created_at->diffForHumans() }}</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Teater</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                            <h6 class="color-brand-1" style="margin-top:5px;">{{$jobs->recruiter->name}}</h6>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="text-muted">Bandung, Indonesia</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            @endforeach                          
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-job-4" role="tabpanel" aria-labelledby="tab-job-4">
                        <div class="row">
                        @foreach($recentAdvertisingJobs as $jobs)                                                                   
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">{{$jobs->name}}</a></h6>                                        
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">{{ $jobs->created_at->diffForHumans() }}</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Iklan</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                            <h6 class="color-brand-1" style="margin-top:5px;">{{$jobs->recruiter->name}}</h6>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="text-muted">Bandung, Indonesia</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                            @endforeach                          
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-job-4" role="tabpanel" aria-labelledby="tab-job-4">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UX Designer &amp; Researcher remote</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Lunacy
                                            </a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Python</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">JavaScript</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Java</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">C++</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Swift</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-2.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UI / UX Designer fulltime</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">PHP</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Python</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">JavaScript</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-3.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$350</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-4.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$100</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Java Software Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-5.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$50</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-6.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$120</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-7.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$150</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-8.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$160</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Lead Quality Control QA</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-9.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UX Designer &amp; Researcher</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-10.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-2.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-job-5" role="tabpanel" aria-labelledby="tab-job-5">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UX Designer &amp; Researcher remote</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Lunacy
                                            </a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Python</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">JavaScript</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Java</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">C++</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Swift</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-2.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UI / UX Designer fulltime</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">PHP</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Python</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">JavaScript</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-3.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$350</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-4.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$100</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Java Software Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-5.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$50</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-6.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$120</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-7.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$150</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-8.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$160</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Lead Quality Control QA</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-9.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UX Designer &amp; Researcher</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-10.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-2.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-job-6" role="tabpanel" aria-labelledby="tab-job-6">
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UX Designer &amp; Researcher remote</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Lunacy
                                            </a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Python</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">JavaScript</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Java</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">C++</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Swift</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-2.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UI / UX Designer fulltime</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">PHP</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Python</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">JavaScript</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-3.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$350</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Full Stack Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-4.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$100</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Java Software Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-5.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$50</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Frontend Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-6.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$120</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-7.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$150</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-8.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$160</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Lead Quality Control QA</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-9.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">UX Designer &amp; Researcher</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-10.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">React Native Web Developer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-1.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-2 grid-bd-16 hover-up">
                                    <div class="card-block-info pt-25">
                                        <h6><a href="job-details.html">Senior System Engineer</a></h6>
                                        <div class="mt-5"><span class="card-briefcase mr-15">Remote</span><span
                                                class="card-time">3 mins ago</span></div>
                                        <div class="mt-20 border-bottom pb-20"><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Illustrator</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5" href="jobs-grid.html">Adobe
                                                XD</a><a class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Figma</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Sketch</a><a
                                                class="btn btn-grey-small bg-14 mb-5 mr-5"
                                                href="jobs-grid.html">Lunacy</a>
                                        </div>
                                        <div class="card-2-bottom mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 col-md-7">
                                                    <div class="d-flex"><img class="img-rounded"
                                                            src="assets/imgs/brands/brand-2.png" alt="jobBox">
                                                        <div class="info-right-img">
                                                            <h6 class="color-brand-1 lh-14">Linkedin</h6><span
                                                                class="card-location font-xxs pl-15 color-text-paragraph-2">New
                                                                York, US</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-5 text-end"><span
                                                        class="card-text-price">$200</span><span
                                                        class="text-muted">/Hour</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @guest



    <div class="section-box mb-30 mt-50">
        <div class="container">
            <div class="box-we-hiring">
                <div class="text-1"><span class="text-we-are">We are</span><span class="text-hiring">Hiring</span></div>
                <div class="text-2">Let&rsquo;s <span class="color-brand-1">Work</span> Together<br> &amp; <span
                        class="color-brand-1">Explore</span> Opportunities</div>
                <div class="text-3">
                    <div class="btn btn-apply btn-apply-icon" data-bs-toggle="modal"
                        data-bs-target="#ModalApplyJobForm">Apply now</div>
                </div>
            </div>
        </div>
    </div>

    @else

    @endguest
    <!-- <div class="section-box mt-70">
        <div class="container">
          <div class="box-trust">
            <div class="row">
              <div class="left-trust col-lg-2 col-md-3 col-sm-3 col-3">
                <h4 class="color-text-paragraph-2">Trusted by</h4>
              </div>
              <div class="right-logos col-lg-10 col-md-9 col-sm-9 col-9">
                <div class="box-swiper">
                  <div class="swiper-container swiper-group-7 swiper">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/microsoft.svg" alt="jobBox"></a></div>
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/sony.svg" alt="jobBox"></a></div>
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/acer.svg" alt="jobBox"></a></div>
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/nokia.svg" alt="jobBox"></a></div>
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/asus.svg" alt="jobBox"></a></div>
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/casio.svg" alt="jobBox"></a></div>
                      <div class="swiper-slide"><a href="index-3.html#"><img src="assets/imgs/page/homepage3/dell.svg" alt="jobBox"></a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    <section class="section-box bg-15 pt-50 pb-50 mt-80">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 text-center mb-30"><img class="img-job-search mt-20"
                        src="assets/imgs/page/homepage3/img-job-search.png" alt="jobBox"></div>
                <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                    <h2 class="mb-40">Job search for people passionate about startup</h2>
                    <div class="box-checkbox mb-30">
                        <h6>Create an account</h6>
                        <p class="font-md color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Donec nec justo a quam varius maximus. Maecenas sodales tortor quis tincidunt commodo.
                        </p>
                    </div>
                    <div class="box-checkbox mb-30">
                        <h6>Search for Jobs</h6>
                        <p class="font-md color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Donec nec justo a quam varius maximus. Maecenas sodales tortor quis tincidunt commodo.
                        </p>
                    </div>
                    <div class="box-checkbox mb-30">
                        <h6>Save &amp; Apply</h6>
                        <p class="font-md color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Donec nec justo a quam varius maximus. Maecenas sodales tortor quis tincidunt commodo.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="text-center">
                <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">Top Recruiters</h2>
                <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Discover your next
                    career move, freelance gig, or internship</p>
            </div>
        </div>
        <div class="container">
            <div class="box-swiper mt-50">
                <div class="swiper-container swiper-group-1 swiper-style-2 swiper">
                    <div class="swiper-wrapper pt-5">
                        <div class="swiper-slide">
                            <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="index-3.html#">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/brands/brand-1.png">
                                        </div>
                                        <div class="text-info-right">
                                            <h4>Linkedin</h4><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><span
                                                class="font-xs color-text-mutted ml-10"><span>(</span><span>68</span><span>)</span></span>
                                        </div>
                                        <div class="text-info-bottom mt-5"><span
                                                class="font-xs color-text-mutted icon-location">New York, US</span><span
                                                class="font-xs color-text-mutted float-end mt-5">25<span> Open
                                                    Jobs</span></span></div>
                                    </div>
                                </a></div>
                            <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="index-3.html#">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/brands/brand-2.png">
                                        </div>
                                        <div class="text-info-right">
                                            <h4>Adobe</h4><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><span
                                                class="font-xs color-text-mutted ml-10"><span>(</span><span>42</span><span>)</span></span>
                                        </div>
                                        <div class="text-info-bottom mt-5"><span
                                                class="font-xs color-text-mutted icon-location">New York, US</span><span
                                                class="font-xs color-text-mutted float-end mt-5">17<span> Open
                                                    Jobs</span></span></div>
                                    </div>
                                </a></div>
                            <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="index-3.html#">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/brands/brand-3.png">
                                        </div>
                                        <div class="text-info-right">
                                            <h4>Dailymotion</h4><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><span
                                                class="font-xs color-text-mutted ml-10"><span>(</span><span>46</span><span>)</span></span>
                                        </div>
                                        <div class="text-info-bottom mt-5"><span
                                                class="font-xs color-text-mutted icon-location">New York, US</span><span
                                                class="font-xs color-text-mutted float-end mt-5">65<span> Open
                                                    Jobs</span></span></div>
                                    </div>
                                </a></div>
                            <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="index-3.html#">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/brands/brand-4.png">
                                        </div>
                                        <div class="text-info-right">
                                            <h4>NewSum</h4><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><span
                                                class="font-xs color-text-mutted ml-10"><span>(</span><span>68</span><span>)</span></span>
                                        </div>
                                        <div class="text-info-bottom mt-5"><span
                                                class="font-xs color-text-mutted icon-location">New York, US</span><span
                                                class="font-xs color-text-mutted float-end mt-5">25<span> Open
                                                    Jobs</span></span></div>
                                    </div>
                                </a></div>
                            <div class="item-5 hover-up wow animate__animated animate__fadeIn"><a href="index-3.html#">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/brands/brand-5.png">
                                        </div>
                                        <div class="text-info-right">
                                            <h4>PowerHome</h4><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><img alt="jobBox"
                                                src="assets/imgs/template/icons/star.svg"><span
                                                class="font-xs color-text-mutted ml-10"><span>(</span><span>87</span><span>)</span></span>
                                        </div>
                                        <div class="text-info-bottom mt-5"><span
                                                class="font-xs color-text-mutted icon-location">New York, US</span><span
                                                class="font-xs color-text-mutted float-end mt-5">34<span> Open
                                                    Jobs</span></span></div>
                                    </div>
                                </a></div>
                        </div>
                    </div>
                </div>
                <!-- <div class="swiper-button-next swiper-button-next-1"></div>
            <div class="swiper-button-prev swiper-button-prev-1"></div> -->
            </div>
        </div>
    </section>
    <section class="section-box mt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-15 mb-lg-0">
                    <div class="box-radius-8 bg-urgent hover-up">
                        <div class="image">
                            <figure><img src="assets/imgs/page/homepage2/job-tools.png" alt="jobBox"></figure>
                        </div>
                        <div class="text-info">
                            <h3>Job Tools Services</h3>
                            <p class="font-sm color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Aliquam laoreet rutrum quam, id faucibus erat interdum a. Curabitur eget tortor a
                                nulla interdum semper.</p>
                            <div class="mt-15"><a class="btn btn-arrow-right" href="index-3.html#">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="box-radius-8 bg-9 hover-up">
                        <div class="image">
                            <figure><img src="assets/imgs/page/homepage2/planning-job.png" alt="jobBox"></figure>
                        </div>
                        <div class="text-info">
                            <h3>Planning a Job?</h3>
                            <p class="font-sm color-text-paragraph-2">Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit. Aliquam laoreet rutrum quam, id faucibus erat interdum a. Curabitur eget tortor a
                                nulla interdum semper.</p>
                            <div class="mt-15"><a class="btn btn-arrow-right" href="index-3.html#">Find Out More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="section-box mt-50 mb-50">
        <div class="container">
          <div class="text-center">
            <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">News and Blog</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">Get the latest news, updates and tips</p>
          </div>
        </div>
        <div class="container">
          <div class="mt-50">
            <div class="box-swiper style-nav-top">
              <div class="swiper-container swiper-group-3 swiper">
                <div class="swiper-wrapper pb-70 pt-5">
                  <div class="swiper-slide">
                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                      <div class="text-center card-grid-3-image"><a href="index-3.html#">
                          <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news1.png"></figure></a></div>
                      <div class="card-block-info">
                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a></div>
                        <h5><a href="blog-details.html">21 Job Interview Tips: How To Make a Great Impression</a></h5>
                        <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the world&amp;rsquo;s most sustainable healthcare company by creating high-quality healthcare products in iconic, sustainable packaging.</p>
                        <div class="card-2-bottom mt-20">
                          <div class="row">
                            <div class="col-lg-6 col-6">
                              <div class="d-flex"><img class="img-rounded" src="assets/imgs/page/homepage1/user1.png" alt="jobBox">
                                <div class="info-right-img"><span class="font-sm font-bold color-brand-1 op-70">Sarah Harding</span><br><span class="font-xs color-text-paragraph-2">06 September</span></div>
                              </div>
                            </div>
                            <div class="col-lg-6 text-end col-6 pt-15"><span class="color-text-paragraph-2 font-xs">8 mins to read</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                      <div class="text-center card-grid-3-image"><a href="index-3.html#">
                          <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news2.png"></figure></a></div>
                      <div class="card-block-info">
                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">Events</a></div>
                        <h5><a href="blog-details.html">39 Strengths and Weaknesses To Discuss in a Job Interview</a></h5>
                        <p class="mt-10 color-text-paragraph font-sm">Our mission is to create the world&amp;rsquo;s most sustainable healthcare company by creating high-quality healthcare products in iconic, sustainable packaging.</p>
                        <div class="card-2-bottom mt-20">
                          <div class="row">
                            <div class="col-lg-6 col-6">
                              <div class="d-flex"><img class="img-rounded" src="assets/imgs/page/homepage1/user2.png" alt="jobBox">
                                <div class="info-right-img"><span class="font-sm font-bold color-brand-1 op-70">Steven Jobs</span><br><span class="font-xs color-text-paragraph-2">06 September</span></div>
                              </div>
                            </div>
                            <div class="col-lg-6 text-end col-6 pt-15"><span class="color-text-paragraph-2 font-xs">6 mins to read</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="card-grid-3 hover-up wow animate__animated animate__fadeIn">
                      <div class="text-center card-grid-3-image"><a href="index-3.html#">
                          <figure><img alt="jobBox" src="assets/imgs/page/homepage1/img-news3.png"></figure></a></div>
                      <div class="card-block-info">
                        <div class="tags mb-15"><a class="btn btn-tag" href="blog-grid.html">News</a></div>
                        <h5><a href="blog-details.html">Interview Question: Why Dont You Have a Degree?</a></h5>
                        <p class="mt-10 color-text-paragraph font-sm">Learn how to respond if an interviewer asks you why you dont have a degree, and read example answers that can help you craft</p>
                        <div class="card-2-bottom mt-20">
                          <div class="row">
                            <div class="col-lg-6 col-6">
                              <div class="d-flex"><img class="img-rounded" src="assets/imgs/page/homepage1/user3.png" alt="jobBox">
                                <div class="info-right-img"><span class="font-sm font-bold color-brand-1 op-70">Wiliam Kend</span><br><span class="font-xs color-text-paragraph-2">06 September</span></div>
                              </div>
                            </div>
                            <div class="col-lg-6 text-end col-6 pt-15"><span class="color-text-paragraph-2 font-xs">9 mins to read</span></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            <div class="text-center"><a class="btn btn-brand-1 btn-icon-load mt--30 hover-up" href="blog-grid.html">Load More Posts</a></div>
          </div>
        </div>
      </section> -->
    <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter">
                <div class="row">
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                            src="assets/imgs/template/newsletter-left.png" alt="joxBox"></div>
                    <div class="col-lg-12 col-xl-6 col-12">
                        <h2 class="text-md-newsletter text-center">New Things Will Always<br> Update Regularly</h2>
                        <div class="box-form-newsletter mt-40">
                            <form class="form-newsletter">
                                <input class="input-newsletter" type="text" value=""
                                    placeholder="Enter your email here">
                                <button class="btn btn-default font-heading icon-send-letter">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                            src="assets/imgs/template/newsletter-right.png" alt="joxBox"></div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
