@extends('layouts.app')

@section('title', 'Daftar Lowongan')

@section('content')    
      <section class="section-box-2">
        <div class="container">
          <div class="banner-hero banner-single banner-single-bg">
            <div class="block-banner text-center">
              <h3 class="wow animate__animated animate__fadeInUp"><span class="color-brand-2">{{$countAllJobs}} Lowongan</span> Tersedia Sekarang</h3>
              <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Cari lowongan yang sesuai dengan kriteria anda, <br class="d-none d-xl-block">dan dapatkan pekerjaan</div>
              <div class="form-find text-start mt-40 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <form action="/list-job" method="GET" class="search-form">                  
                  <input class="form-input input-keysearch mr-10" type="text" name="search" placeholder="Kata Kunci ">
                  <button type="submit" class="btn btn-default btn-find font-sm">Cari</button>
                </form>                
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section-box mt-30">
        <div class="container">
          <div class="row flex-row-reverse">
            <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right">
              <div class="content-page">
                <div class="box-filters-job">
                  <div class="row">
                    <div class="col-xl-6 col-lg-5">
                    <div class="col-xl-6 col-lg-5">
                      <span class="text-small text-showing">
                          Showing 
                          <strong>{{ ($allJobs->currentPage() - 1) * $allJobs->perPage() + 1 }}-{{ min($allJobs->currentPage() * $allJobs->perPage(), $allJobs->total()) }} </strong>
                          of 
                          <strong>{{ $allJobs->total() }}</strong> jobs
                      </span>
                  </div>

                    </div>
                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                      <div class="display-flex2">
                        <!-- <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                          <div class="dropdown dropdown-sort">
                            <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                              <li><a class="dropdown-item active" href="jobs-grid.html#">10</a></li>
                              <li><a class="dropdown-item" href="jobs-grid.html#">12</a></li>
                              <li><a class="dropdown-item" href="jobs-grid.html#">20</a></li>
                            </ul>
                          </div>
                        </div> -->
                        <!-- <div class="box-border">
                          <span class="text-sortby">Sort by:</span>
                          <div class="dropdown dropdown-sort">
                              <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                  <span>{{ request('sort', 'desc') == 'desc' ? 'Newest Post' : 'Oldest Post' }}</span>
                                  <i class="fi-rr-angle-small-down"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                                  <li>                                  
                                      <a class="dropdown-item {{ request('sort', 'desc') == 'desc' ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}">Newest Post</a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item {{ request('sort') == 'asc' ? 'active' : '' }}"  href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}">Oldest Post</a>
                                  </li>
                              </ul>
                          </div>
                        </div> -->
                        
                          <a style="margin-right:10px;" href="{{ request()->fullUrlWithQuery(['sort' => 'desc']) }}">Postingan Terbaru</a>
                                          
                          <a style="margin-right:10px;" href="{{ request()->fullUrlWithQuery(['sort' => 'asc']) }}">Postingan Terlama</a>                                                 
                      
                        <div class="box-view-type"><a class="view-type" href="/list-job"><img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox"></a></div>
                      </div>
                    </div>
                  </div>
                </div>                
                <div class="row">
                @foreach($allJobs as $jobs)                              
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-2 hover-up">
                      <div class="card-grid-2-image-left"><span class="flash"></span>
                        <div class="image-box"><img src="assets/imgs/brands/brand-1.png" alt="jobBox"></div>
                        <div class="right-info"><a class="name-job" href="{{ route('jobDetail', $jobs->id) }}">{{$jobs->recruiter->name}}</a><span class="location-small">{{$jobs->recruiter->city}}, Indonesia</span></div>
                      </div>
                      <div class="card-block-info">
                        <h6><a href="job-details.html">{{$jobs->name}}</a></h6>
                        <div class="mt-5"><span class="card-briefcase">Fulltime</span><span class="card-time">{{ $jobs->created_at->diffForHumans() }}</span></div>
                        <p class="font-sm color-text-paragraph mt-15">{{$jobs->description}}</p>
                        <div class="mt-30"><a class="btn btn-grey-small mr-5" href="jobs-grid.html">{{$jobs->type}}</a></div>
                        <div class="card-2-bottom mt-30">
                          <div class="row">
                            <div style="" class="col-lg-6 col-6">
                              <a href="{{ route('jobDetail', $jobs->id) }}">
                                <div class="btn btn-apply-now-detail">Detail Lowongan</div>                                  
                              </a>
                            </div>
                            <div class="col-lg-6 col-6 text-end">
                            @if(auth()->check())
                              @if(auth()->user()->role == "user")       
                              <!-- <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalUser">Lamar Sekarang</div>                        -->
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalUser{{ $jobs->id }}">Lamar Lowongan</div>                                                            
                              @elseif(auth()->user()->role == "admin")
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalManager">Lamar Lowongan</div>                       
                              @elseif(auth()->user()->role == "manager")         
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalManager">Lamar Lowongan</div>                       
                              @else                                
                              @endif 
                            @else
                              <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalAnonym">Lamar Lowongan</div>                       
                            @endif                                                      
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>   
                  @if(auth()->check())
                          <div class="modal fade" id="ModalUser{{ $jobs->id }}" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content apply-job-form">
                                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                    <div class="text-center">
                                      <p class="font-sm text-brand-2">Melamar Lowongan </p>
                                      <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Mulai Karirmu Dari Sekarang</h2>
                                      <p class="font-sm text-muted mb-30">Lengkapi data diri anda untuk dikirimkan ke pencari pekerja.</p>
                                    </div>                                              
                                    <form class="login-register text-start mt-20 pb-30" action="{{ route('create-apply') }}" method="POST" enctype="multipart/form-data">
                                    <!-- $url = Storage::url('resume/'.$filename); -->

                                      @csrf
                                    <input type="hidden" name="applier_id" value="{{ Auth::user()->id }}">
                                      <input type="hidden" name="job_id" value="{{$jobs->id}}">
                                      <div class="form-group">
                                        <label class="form-label" for="input-2">Email *</label>
                                        <input class="form-control" id="input-2" type="email" required="" name="email" placeholder="stevenjob@gmail.com">
                                      </div>
                                      <div class="form-group">
                                        <label class="form-label" for="number">Nomor Telpon (Whatsapp Aktif) *</label>
                                        <input class="form-control" id="number" type="text" required="" name="phone_number" placeholder="(+01) 234 567 89">
                                      </div>              
                                      <div class="form-group">
                                        <label class="form-label" for="file">Unggah Resume *</label>
                                        <input class="form-control" id="file" name="resume" type="file" accept="application/pdf">
                                      </div>
                                      <div class="form-group">
                                        <label class="form-label" for="des">Tautan Vidio</label>
                                        <input class="form-control" id="des" type="text" required="" name="link_vidio" placeholder="Your description...">
                                      </div>                                      
                                      <div class="form-group">
                                        <button class="btn btn-default hover-up w-100" type="submit">Lamar Lowongan</button>
                                      </div>
                                      <div class="text-muted text-center">Butuh bantuan? <a href="page-contact.html">Hubungi Kami</a></div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>        
                            @else
                            @endif                          
                  @endforeach
                </div>                
              </div>
              <div class="paginations">
                  {{ $allJobs->links() }}
              </div>

            </div>
            <div class="col-lg-3 col-md-12 col-sm-12 col-12">
              <div class="sidebar-shadow none-shadow mb-30">
                <div class="sidebar-filters">
                  <div class="filter-block head-border mb-30">
                  <h5>Advance Filter <a class="link-reset" href="{{ route('jobList') }}">Reset</a></h5>
                  </div>
                  <div class="filter-block mb-30">
                    <div class="form-group select-style select-style-icon">
                      <select class="form-control form-icons select-active">
                        <option>Bandung, Indonesia</option>
                        <option>Jakarta</option>
                        <option>Balikpapan</option>
                        <option>Medan</option>
                      </select><i class="fi-rr-marker"></i>
                    </div>
                  </div>
                  <form method="GET" action="{{ route('jobList') }}">
                      <!-- ... other filters ... -->
                      <div class="filter-block mb-20">
                          <h5 class="medium-heading mb-15">Type</h5>
                          <div class="form-group">
                              <ul class="list-checkbox">
                                  <li>
                                      <label class="cb-container">
                                          <input type="checkbox" name="types[]" value="all" {{ in_array('all', $types) ? 'checked' : '' }}><span class="text-small">All</span><span class="checkmark"></span>
                                      </label><span class="number-item">{{$countAllJobs}}</span>
                                  </li>
                                  <li>
                                      <label class="cb-container">
                                          <input type="checkbox" name="types[]" value="film" {{ in_array('film', $types) ? 'checked' : '' }}><span class="text-small">Film</span><span class="checkmark"></span>
                                      </label><span class="number-item">{{$countFilmJobs}}</span>
                                  </li>
                                  <li>
                                      <label class="cb-container">
                                          <input type="checkbox" name="types[]" value="film-pendek" {{ in_array('film-pendek', $types) ? 'checked' : '' }}><span class="text-small">Film Pendek</span><span class="checkmark"></span>
                                      </label><span class="number-item">{{$countShortFilmJobs}}</span>
                                  </li>
                                  <li>
                                      <label class="cb-container">
                                          <input type="checkbox" name="types[]" value="teater" {{ in_array('teater', $types) ? 'checked' : '' }}><span class="text-small">Teater</span><span class="checkmark"></span>
                                      </label><span class="number-item">{{$countTheaterJobs}}</span>
                                  </li>
                                  <li>
                                      <label class="cb-container">
                                          <input type="checkbox" name="types[]" value="iklan" {{ in_array('iklan', $types) ? 'checked' : '' }}><span class="text-small">Iklan</span><span class="checkmark"></span>
                                      </label><span class="number-item">{{$countAdvertisingJobs}}</span>
                                  </li>
                              </ul>
                          </div>
                      </div>
                      <button class="btn btn-default hover-up w-100" type="submit" name="login">Filter</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>            
      <div class="modal fade" id="ModalManager" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content apply-job-form">
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-body pl-30 pr-30 pt-50">
            <div class="text-center">
              <p class="font-sm text-brand-2">Melamar Lowongan </p>
              <br>
              <h3 class="mt-10 mb-5 text-brand-1 text-capitalize">Akun Perusahaan Tidak Dapat Melamar Pekerjaan</h3>
              <br>
              <p class="font-sm text-muted mb-30">Keluar dari akun perusahaan lalu masuk atau daftar sebagai pencari pekerja.</p>
            </div>            
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalAnonym" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content apply-job-form">
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-body pl-30 pr-30 pt-50">
            <div class="text-center">
              <p class="font-sm text-brand-2">Melamar Lowongan </p>
              <br>
              <h3 class="mt-10 mb-5 text-brand-1 text-capitalize">Akun Dibutuhkan</h3>
              <br>
              <p class="font-sm text-muted mb-30">Harap daftarkan diri Anda atau masuk sebagai pencari pekerja untuk dapat mengakses dan melamar peluang pekerjaan yang tersedia.</p>
              <a class="font-sm text-brand-2" href="/register">Daftar</a>                                                   
              <a class="font-md text-brand-2" href="/login">Masuk</a>     
            </div>            
          </div>
        </div>
      </div>
    </div>    
@endsection    