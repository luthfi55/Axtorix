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
              <!-- <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm">Lamar Lowongan</div> -->
              @if(auth()->check())
                              @if(auth()->user()->role == "user")       
                              <!-- <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalUser">Lamar Sekarang</div>                        -->
                              @if($job->required_vidio == null)
                              <div class="btn btn-default mr-15" data-bs-toggle="modal" data-bs-target="#ModalUserNonVidio{{ $job->id }}">Lamar Lowongan</div>
                              @else                              
                              <div class="btn btn-default mr-15" data-bs-toggle="modal" data-bs-target="#ModalUser{{ $job->id }}">Lamar Lowongan</div>                                                            
                              @endif
                              @elseif(auth()->user()->role == "admin")
                              <div class="btn btn-apply-icon btn-apply btn-apply-big hover-up" data-bs-toggle="modal" data-bs-target="#ModalManager">Lamar Lowongan</div>                       
                              @elseif(auth()->user()->role == "manager")         
                              
                              @else                                
                              @endif 
                            @else
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalAnonym">Lamar Lowongan</div>                       
              @endif         
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
                  <!-- <div class="col-md-5"><a class="btn btn-default mr-15" href="job-details.html#">Lamar Lowongan</a></div> -->
                  @if(auth()->check())
                              @if(auth()->user()->role == "user")  
                              @if($job->required_vidio == null)
                              <div class="btn btn-default mr-15" data-bs-toggle="modal" data-bs-target="#ModalUserNonVidio{{ $job->id }}">Lamar Lowongan</div>
                              @else                              
                              <div class="btn btn-default mr-15" data-bs-toggle="modal" data-bs-target="#ModalUser{{ $job->id }}">Lamar Lowongan</div>                                                            
                              @endif     
                                @if($checkProfile == false)       
                                  <div class="modal fade" id="ModalUser{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content apply-job-form">
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                          <div class="text-center">
                                            <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Isi Profil Anda Terlebih Dahulu</h2>
                                            <a href="{{ route('profile', Auth::user()->id) }}"> <h4 class="font-lg mt-30 mb-30" style=color:#4477CE;>Lengkapi profil anda disini.</h4></a>
                                          </div>                                                                                    
                                        </div>
                                      </div>
                                    </div>
                                </div>        
                                <div class="modal fade" id="ModalUserNonVidio{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content apply-job-form">
                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                        <div class="text-center">
                                          <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                          <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Lengkapi Data Diri Anda Terlebih Dahulu</h2>
                                          <a href="{{ route('profile', Auth::user()->id) }}"> <h4 class="font-lg mt-30 mb-30" style=color:#4477CE;>Lengkapi data diri anda disini.</h4></a>
                                        </div>                                                                                                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>                                                
                              @else
                              @if($checkResume == false)
                                <div class="modal fade" id="ModalUser{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content apply-job-form">
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                          <div class="text-center">
                                            <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Masukkan CV Anda Terlebih Dahulu</h2>
                                            <a href="{{route('profile-cv', Auth::user()->id)}}"> <h4 class="font-lg mt-30 mb-30" style=color:#4477CE;>Masukkan cv anda disini.</h4></a>
                                          </div>                                                                                    
                                        </div>
                                      </div>
                                    </div>
                                  </div>        
                                  <div class="modal fade" id="ModalUserNonVidio{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content apply-job-form">
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                          <div class="text-center">
                                            <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                            <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Masukkan CV Anda Terlebih Dahulu</h2>
                                            <a href="{{route('profile-cv', Auth::user()->id)}}"> <h4 class="font-lg mt-30 mb-30" style=color:#4477CE;>Masukkan cv anda disini.</h4></a>
                                          </div>                                                                                                                        
                                        </div>
                                      </div>
                                    </div>
                                  </div>             
                              @else
                              @if($checkEducation == false)
                                <div class="modal fade" id="ModalUser{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content apply-job-form">
                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                        <div class="text-center">
                                          <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                          <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Masukkan Riwayat Edukasi Anda Terlebih Dahulu</h2>
                                          <a href="{{route('profile-cv', Auth::user()->id)}}"> <h4 class="font-lg mt-30 mb-30" style=color:#4477CE;>Masukkan riwayat edukasi anda disini.</h4></a>
                                        </div>                                                                                    
                                      </div>
                                    </div>
                                  </div>
                                </div>        
                                <div class="modal fade" id="ModalUserNonVidio{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content apply-job-form">
                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                        <div class="text-center">
                                          <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                          <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Masukkan Riwayat Edukasi Anda Terlebih Dahulu</h2>
                                          <a href="{{route('profile-cv', Auth::user()->id)}}"> <h4 class="font-lg mt-30 mb-30" style=color:#4477CE;>Masukkan riwayat edukasi anda disini.</h4></a>
                                        </div>                                                                                                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>  
                              @else
                                <div class="modal fade" id="ModalUser{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content apply-job-form">
                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                        <div class="text-center">
                                          <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                          <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Mulai Karirmu Dari Sekarang</h2>
                                          <!-- <p class="font-sm text-muted mb-30">Lengkapi data diri anda untuk dikirimkan ke pencari pekerja.</p> -->
                                        </div>                                              
                                        <form class="login-register text-start mt-20 pb-30" action="{{ route('create-apply') }}" method="POST" enctype="multipart/form-data">
                                        <!-- $url = Storage::url('resume/'.$filename); -->

                                          @csrf
                                        <input type="hidden" name="applier_id" value="{{ Auth::user()->id }}">
                                          <input type="hidden" name="job_id" value="{{$job->id}}">
                                          <div class="form-group">
                                            <label class="form-label" for="input-2">Pastikan data diri yang Anda masukkan sudah benar dan terupdate, agar Anda memiliki peluang terbaik untuk mendapatkan pekerjaan yang Anda inginkan.</label>
                                            <!-- <label class="form-label" for="input-2">Email *</label> -->
                                            <input hidden class="form-control" id="input-2" type="email" required="" name="email" placeholder="stevenjob@gmail.com" value="{{$applier->email}}">
                                          </div>
                                          <div class="form-group">
                                          <p class="" for="input-2" style="color:#4477CE;">Deskripsi vidio yang diinginkan:</p>
                                          <p class="" for="input-2" style="">{{$job->required_vidio}}</p>
                                            <!-- <label class="form-label" for="number">Nomor Telpon (Whatsapp Aktif) *</label> -->
                                            <input hidden class="form-control" id="number" type="text" required="" name="phone_number" placeholder="(+01) 234 567 89" value="{{$applier->phone_number}}">
                                          </div>              
                                          <div class="form-group">
                                            <!-- <label class="form-label" for="file">Unggah Resume (Kosongkan jika cv pada profile sudah paling terbaru)</label>
                                            <input class="form-control" id="file" name="resume" type="file" accept="application/pdf"> -->
                                          </div>
                                          <div class="form-group mb-30">
                                            <label class="form-label" for="des">Tautan Vidio</label>
                                            <input class="form-control" id="des" type="text" required="" name="link_vidio" placeholder="Your description...">
                                          </div>                                      
                                          <div class="">
                                            <button class="btn btn-default hover-up w-100" type="submit">Lamar Lowongan</button>
                                          </div>                                        
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>        
                                <div class="modal fade" id="ModalUserNonVidio{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content apply-job-form">
                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                      <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                        <div class="text-center">
                                          <p class="font-sm text-brand-2">Lamar Lowongan </p>
                                          <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Mulai Karirmu Dari Sekarang</h2>
                                          <!-- <p class="font-sm text-muted mb-30">Lengkapi data diri anda untuk dikirimkan ke pencari pekerja.</p> -->
                                        </div>                                              
                                        <form class="login-register text-start mt-20 pb-30" action="{{ route('create-apply') }}" method="POST" enctype="multipart/form-data">
                                        <!-- $url = Storage::url('resume/'.$filename); -->

                                          @csrf
                                        <input type="hidden" name="applier_id" value="{{ Auth::user()->id }}">
                                          <input type="hidden" name="job_id" value="{{$job->id}}">
                                          <div class="form-group">
                                          <label class="form-label" for="input-2">Pastikan data diri yang Anda masukkan sudah benar dan terupdate, agar Anda memiliki peluang terbaik untuk mendapatkan pekerjaan yang Anda inginkan.</label>
                                            <!-- <label class="form-label" for="input-2">Email *</label> -->
                                            <input hidden class="form-control" id="input-2" type="email" required="" name="email" placeholder="stevenjob@gmail.com" value="{{$applier->email}}">
                                          </div>
                                          <div class="form-group">
                                            <!-- <label class="form-label" for="number">Nomor Telpon (Whatsapp Aktif) *</label> -->
                                            <input hidden class="form-control" id="number" type="text" required="" name="phone_number" placeholder="(+01) 234 567 89" value="{{$applier->phone_number}}">
                                          </div>              
                                          <div class="form-group">
                                            <!-- <label class="form-label" for="file">Unggah Resume *</label> -->
                                            <input hidden class="form-control" id="file" name="resume" type="file" accept="application/pdf">
                                          </div>                                                                      
                                          <div class="form-group">
                                            <button class="btn btn-default hover-up w-100" type="submit">Lamar Lowongan</button>
                                          </div>                                        
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div> 
                              @endif
                              @endif
                              @endif                              
                                                                                     
                              @elseif(auth()->user()->role == "admin")                                                            
                                                          
                              @endif 
                            @else
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalAnonym">Lamar Lowongan</div>                       
                              <div class="modal fade" id="ModalAnonym" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content apply-job-form">
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-body pl-30 pr-30 pt-50">
            <div class="text-center">
              <p class="font-sm text-brand-2">Lamar Lowongan </p>
              <br>
              <h3 class="mt-10 mb-5 text-brand-1 text-capitalize">Akun Dibutuhkan</h3>
              <br>
              <p class="font-sm text-muted mb-30">Harap daftarkan diri Anda atau masuk sebagai pencari pekerja untuk dapat mengakses dan Lamar peluang pekerjaan yang tersedia.</p>
              <a class="font-sm text-brand-2" href="/register">Daftar</a>                                                   
              <a class="font-md text-brand-2" href="/login">Masuk</a>     
            </div>            
          </div>
        </div>
      </div>
    </div>   
              @endif    
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
              <div class="sidebar-border">
                <div class="sidebar-heading">
                  <div class="avatar-sidebar">
                    <figure><img width="" alt="jobBox" src="{{ Storage::url($recruiter->picture) }}"></figure>
                    <div class="sidebar-info"><span class="sidebar-company">{{$recruiter->name}}</span><span class="card-location">{{$recruiter->city}}</span>
                    <a class="link-underline mt-15" href="{{route('recruiterDetail', $recruiter->id)}}">Lihat Detail</a></div>
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
      <!-- <section class="section-box mt-50 mb-20">
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
    </section> -->    
@endsection