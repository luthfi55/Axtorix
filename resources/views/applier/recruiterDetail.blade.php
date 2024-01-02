@extends('layouts.app')

@section('title', 'Detail Recruiter')

@section('content')    
<style>
  .my-custom-pagination .page-link {
    color: #4477CE;
}

.my-custom-pagination .page-link:hover {
    color: #4477CE; /* You might want a different color for hover state */
}

.my-custom-pagination .page-item.active .page-link {
    background-color: #4477CE;
    border-color: #4477CE;
    color: white; /* Text color for active page number */
}

</style>
      <section class="section-box-2">
        <div class="container">
          <div class="banner-hero banner-image-single"><img src="../assets/imgs/page/company/img2.jpg" alt="jobBox"></div>
          <div class="box-company-profile">
            <div class=""><img width="60px" src="{{ Storage::url($recruiter->picture) }}" alt=""></div>
            <div class="row mt-10">
              <div class="col-lg-8 col-md-12">
                <h2 class="">{{$recruiter->name}} </h2>
                <span class="card-location font-regular">{{$recruiter->city}}</span>
                <!-- <p class="mt-5 font-md color-text-paragraph-2 mb-15">Our Mission to make working life simple</p> -->
              <!-- </div>
              <div class="col-lg-4 col-md-12 text-lg-end"><a class="btn btn-call-icon btn-apply btn-apply-big" href="page-contact.html">Contact us</a></div>
            </div> -->
          </div>
          <div class="box-nav-tabs mt-10 mb-5">
            <ul class="nav" role="tablist">
              <!-- <li><a class="btn btn-border aboutus-icon mr-15 mb-5 active" href="company-details.html#tab-about" data-bs-toggle="tab" role="tab" aria-controls="tab-about" aria-selected="true">About us</a></li> -->
              <!-- <li><a class="btn btn-border recruitment-icon mr-15 mb-5" href="company-details.html#tab-recruitments" data-bs-toggle="tab" role="tab" aria-controls="tab-recruitments" aria-selected="false">Recruitments</a></li>
              <li><a class="btn btn-border people-icon mb-5" href="company-details.html#tab-people" data-bs-toggle="tab" role="tab" aria-controls="tab-people" aria-selected="false">People</a></li> -->
            </ul>
          </div>
          <div class="border-bottom pt-10 pb-10"></div>
        </div>
      </section>
      <section class="section-box mt-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
              <div class="content-single">
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tab-about" role="tabpanel" aria-labelledby="tab-about">
                    <h4>Selamat datang di {{$recruiter->name}}</h4>
                    <p>{{$recruiter->description}}</p>                    
                  </div>
                  <!-- <div class="tab-pane fade" id="tab-recruitments" role="tabpanel" aria-labelledby="tab-recruitments">
                    <h4>Recruitments</h4>
                    <p>The AliStudio Design team has a vision to establish a trusted platform that enables productive and healthy enterprises in a world of digital and remote everything, constantly changing work patterns and norms, and the need for organizational resiliency.</p>
                    <p>The ideal candidate will have strong creative skills and a portfolio of work which demonstrates their passion for illustrative design and typography. This candidate will have experiences in working with numerous different design platforms such as digital and print forms.</p>
                  </div>
                  <div class="tab-pane fade" id="tab-people" role="tabpanel" aria-labelledby="tab-people">
                    <h4>People</h4>
                    <p>The AliStudio Design team has a vision to establish a trusted platform that enables productive and healthy enterprises in a world of digital and remote everything, constantly changing work patterns and norms, and the need for organizational resiliency.</p>
                    <p>The ideal candidate will have strong creative skills and a portfolio of work which demonstrates their passion for illustrative design and typography. This candidate will have experiences in working with numerous different design platforms such as digital and print forms.</p>
                  </div> -->
                </div>
              </div>
              <div class="box-related-job content-page">
                <h5 class="mb-30">Lowongan yang tersedia di {{$recruiter->name}}</h5>
                <div class="box-list-jobs display-list">
                @foreach($job as $jobs)
                  <div class="col-xl-12 col-12">
                    <div class="card-grid-2 hover-up">                 
                      <div class="card-block-info mt-30">
                        <h4>{{$jobs->name}}</h4>
                        <div class="mt-5">
                            <span class="card-time">{{ $jobs->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="font-sm color-text-paragraph mt-10">{{$jobs->description}}</p>
                        <div class="card-2-bottom mt-20">
                          <div class="row">
                            <div class="col-lg-7 col-7">
                            <span class="card-text-price" style="text-transform: capitalize;">{{$jobs->type}}</span>
                                <span class="text-muted"></span>
                            </div>
                            <div class="col-lg-5 col-5 text-end">
                              <a href="{{ route('jobDetail', $jobs->id) }}" class="btn btn-apply-now">Lihat Detail</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>                                    
                  @endforeach
                </div>
                <div class="paginations my-custom-pagination">
                {{ $job->links('vendor.pagination.bootstrap-4') }}
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
              <div class="sidebar-border">
                <div class="sidebar-heading">
                  <div class="avatar-sidebar">
                    <div class="sidebar-info pl-0"><span class="sidebar-company">{{$recruiter->name}}</span><span class="card-location">{{$recruiter->city}}</span></div>
                  </div>
                </div>                
                <div class="sidebar-list-job">
                  <ul>                    
                    <li>
                      <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                      <div class="sidebar-text-info"><span class="text-description">Lokasi</span><strong class="small-heading">{{$recruiter->address}}, {{$recruiter->city}}</strong></div>
                    </li>                    
                    <li>
                      <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                      <div class="sidebar-text-info"><span class="text-description">Last Jobs Posted</span><strong class="small-heading">4 days</strong></div>
                    </li>
                  </ul>
                </div>
                <div class="sidebar-list-job">
                  <ul class="ul-disc">                    
                    <li>Nomor: {{$recruiter->phone_number}}</li>
                    <li>Email: {{$recruiter->user->email}}</li>
                  </ul>                  
                </div>
              </div>              
            </div>
          </div>
        </div>
      </section>
      
    @endsection