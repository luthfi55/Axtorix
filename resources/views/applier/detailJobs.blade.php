@extends('layouts.app')

@section('title', 'Detail Lowongan')

@section('content')    
      <section class="section-box-2">
        <div class="container">
          <div class="banner-hero banner-image-single"><img src="/dashboard/assets/imgs/page/job-single/thumb.png" alt="jobBox"></div>
          <div class="row mt-10">
            <div class="col-lg-8 col-md-12">
              <h3>{{$job->name}}</h3>
              <div class="mt-0 mb-15"><span class="card-time">{{ $job->created_at->diffForHumans() }}</span></div>
            </div>
            <div class="col-lg-4 col-md-12 text-lg-end">
              <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Apply now</div>
            </div>
          </div>
          <div class="border-bottom pt-10 pb-10"></div>
        </div>
      </section>
      <section class="section-box mt-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">              
              <div class="content-single">
                <h4>Deskripsi</h4>
                {{$job->description}}
                <h4>Deskripsi Vidio Casting</h4>
                @if  ($job->required_vidio == null)
                Tidak ada
                @else
                {{$job->required_vidio}}             
                @endif
              </div>              
              <div class="single-apply-jobs">
                <div class="row align-items-center">
                  <div class="col-md-5"><a class="btn btn-default mr-15" href="job-details.html#">Apply now</a><a class="btn btn-border" href="job-details.html#">Save job</a></div>
                  
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
              <div class="sidebar-border">
                <div class="sidebar-heading">
                  <div class="avatar-sidebar">
                    <figure><img alt="jobBox" src="/dashboard/assets/imgs/page/job-single/avatar.png"></figure>
                    <div class="sidebar-info"><span class="sidebar-company">{{$recruiter->name}}</span><span class="card-location">{{$recruiter->city}}</span><a class="link-underline mt-15" href="job-details.html#">Lihat Detail</a></div>
                  </div>
                </div>
                <div class="sidebar-list-job">
                  <!-- <div class="box-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2970.3150609575905!2d-87.6235655!3d41.886080899999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880e2ca8b34afe61:0x6caeb5f721ca846!2s205%20N%20Michigan%20Ave%20Suit%20810,%20Chicago,%20IL%2060601,%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1658551322537!5m2!1svi!2s" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div> -->
                  <ul class="ul-disc">
                    <li>{{$recruiter->address}}</li>
                    <li>Phone: {{$recruiter->phone_number}}</li>
                    <li>Email: {{$user->email}}</li>
                  </ul>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </section>
      <section class="section-box mt-50 mb-50">
        <div class="container">
                    
        </div>
      </section>
      <section class="section-box mt-50 mb-20">
        <div class="container">
            <div class="box-newsletter">
                <div class="row">
                    <div class="col-xl-3 col-12 text-center d-none d-xl-block"><img
                            src="../assets/imgs/template/newsletter-left.png" alt="joxBox"></div>
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
                            src="../assets/imgs/template/newsletter-right.png" alt="joxBox"></div>
                </div>
            </div>
        </div>
    </section>
@endsection