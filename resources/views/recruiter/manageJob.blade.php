@extends('layouts.dashboard-app')

@section('title', 'Atur Lowongan')

@section('content')
      <div class="box-content">
        <div class="box-heading">
          <div class="box-title"> 
            <h3 class="mb-35">Atur Lowongan</h3>
          </div>
          <div class="box-breadcrumb"> 
            <div class="breadcrumbs">
              <ul> 
                <li> <a class="icon-home" href="index.html">Admin</a></li>
                <li><span>Manage Jobs</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-12"> 
            <div class="section-box">
              <div class="container"> 
                <div class="panel-white mb-30">
                  <div class="box-padding">
                    <!-- <div class="box-filters-job">
                      <div class="row">
                        <div class="col-xl-6 col-lg-5"><span class="font-sm text-showing color-text-paragraph">Showing 41-60 of 944 jobs</span></div>
                        <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                          <div class="display-flex2">
                            <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                              <div class="dropdown dropdown-sort">
                                <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                                  <li><a class="dropdown-item active" href="my-job-grid.html#">10</a></li>
                                  <li><a class="dropdown-item" href="my-job-grid.html#">12</a></li>
                                  <li><a class="dropdown-item" href="my-job-grid.html#">20</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="box-border"><span class="text-sortby">Sort by:</span>
                              <div class="dropdown dropdown-sort">
                                <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>Newest Post</span><i class="fi-rr-angle-small-down"></i></button>
                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                                  <li><a class="dropdown-item active" href="my-job-grid.html#">Newest Post</a></li>
                                  <li><a class="dropdown-item" href="my-job-grid.html#">Oldest Post</a></li>
                                  <li><a class="dropdown-item" href="my-job-grid.html#">Rating Post</a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="box-view-type"><a class="view-type" href="my-job-list.html"><img src="/dashboard/assets/imgs/template/icons/icon-list.svg" alt="jobBox"></a><a class="view-type" href="my-job-grid.html"><img src="/dashboard/assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>
                          </div>
                        </div>
                      </div>
                    </div> -->
                    <div class="row">
                      @foreach($jobs as $job)
                      <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left"><span class="flash"></span>
                            <div class="image-box"><img src="/dashboard/assets/imgs/brands/brand-1.png" alt="jobBox"></div>
                            <div class="right-info"><a class="name-job" href="https://wp.alithemes.com/html/jobbox/demos/dashboard/company-details.html">{{$job->recruiter->name}}</a><span class="location-small">{{$job->recruiter->city}}, Indonesia</span></div>
                          </div>
                          <div class="card-block-info">
                            <h6><a href="https://wp.alithemes.com/html/jobbox/demos/dashboard/job-details.html">{{$job->name}}</a></h6>
                            <div class="mt-5"><span class="card-briefcase"></span><span class="card-time"><span>{{ $job->created_at->diffForHumans() }}</span></span></div>
                            <p class="font-sm color-text-paragraph mt-15">{{$job->description}}</p>
                            <div class="mt-30"><a class="btn btn-grey-small mr-5" href="">{{$job->type}}</a>
                            </div>
                            <div class="card-2-bottom mt-30">
                              <div class="row">
                                <div class="col-lg-7 col-7"><span class="card-text-price">{{$job->applies_count}}</span><span class="text-muted"> Pengguna Melamar</span></div>
                                <div class="col-lg-5 col-5 text-end">                                  
                                <a href="{{ route('job.detail', $job->id) }}">
                                    <div class="btn btn-apply-now">Detail</div>
                                </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                     @endforeach
        
        <div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content apply-job-form">
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body pl-30 pr-30 pt-50">
                <div class="text-center">
                  <p class="font-sm text-brand-2">Job Application </p>
                  <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
                  <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer.                   </p>
                </div>
                <form class="login-register text-start mt-20 pb-30" action="#">
                  <div class="form-group">
                    <label class="form-label" for="input-1">Full Name *</label>
                    <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="input-2">Email *</label>
                    <input class="form-control" id="input-2" type="email" required="" name="emailaddress" placeholder="stevenjob@gmail.com">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="number">Contact Number *</label>
                    <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="des">Description</label>
                    <input class="form-control" id="des" type="text" required="" name="Description" placeholder="Your description...">
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="file">Upload Resume</label>
                    <input class="form-control" id="file" name="resume" type="file">
                  </div>
                  <div class="login_footer form-group d-flex justify-content-between">
                    <label class="cb-container">
                      <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
                    </label><a class="text-muted" href="https://wp.alithemes.com/html/jobbox/demos/dashboard/page-contact.html">Lean more</a>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
                  </div>
                  <div class="text-muted text-center">Do you need support? <a href="https://wp.alithemes.com/html/jobbox/demos/dashboard/page-contact.html">Contact Us</a></div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection