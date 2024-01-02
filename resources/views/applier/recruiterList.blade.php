@extends('layouts.app')

@section('title', 'Daftar Recruiter')

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
          <div class="banner-hero banner-company">
            <div class="block-banner text-center">
              <h3 class="wow animate__animated animate__fadeInUp">Daftar Recruiter</h3>
              <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
              Temukan recruiter profesional terbaik di industri ini melalui Daftar Recruiter kami, yang dirancang untuk <br>menghubungkan Anda dengan peluang karir yang sempurna.
              </div>
              
            </div>
          </div>
        </div>
      </section>
      <section class="section-box mt-30">
        <div class="container">
          <div class="row flex-row-reverse">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 float-right">
              <div class="content-page">
                <div class="box-filters-job">
                  <div class="row">
                    <div class="col-xl-6 col-lg-5">
                    <span class="text-small text-showing">Menampilkan <strong>{{ ($recruiter->currentPage() - 1) * $recruiter->perPage() + 1 }}-{{ min($recruiter->currentPage() * $recruiter->perPage(), $recruiter->total()) }}</strong> dari <strong>{{ $recruiter->total() }}</strong> lamaran</span>
                    </div>
                    <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                      <div class="display-flex2">
                        <!-- <div class="box-border mr-10"><span class="text-sortby">Show:</span>
                          <div class="dropdown dropdown-sort">
                            <button class="btn dropdown-toggle" id="dropdownSort" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>12</span><i class="fi-rr-angle-small-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort">
                              <li><a class="dropdown-item active" href="companies-grid.html#">10</a></li>
                              <li><a class="dropdown-item" href="companies-grid.html#">12</a></li>
                              <li><a class="dropdown-item" href="companies-grid.html#">20</a></li>
                            </ul>
                          </div>
                        </div>
                        <div class="box-border"><span class="text-sortby">Sort by:</span>
                          <div class="dropdown dropdown-sort">
                            <button class="btn dropdown-toggle" id="dropdownSort2" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"><span>Newest Post</span><i class="fi-rr-angle-small-down"></i></button>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="dropdownSort2">
                              <li><a class="dropdown-item active" href="companies-grid.html#">Newest Post</a></li>
                              <li><a class="dropdown-item" href="companies-grid.html#">Oldest Post</a></li>
                              <li><a class="dropdown-item" href="companies-grid.html#">Rating Post</a></li>
                            </ul>
                          </div>
                        </div> -->
                        <div class="box-view-type">
                          <!-- <a class="view-type" href="jobs-list.html">
                          <img src="assets/imgs/template/icons/icon-list.svg" alt="jobBox">
                        </a> -->
                          <a class="view-type" href="">
                            <img src="assets/imgs/template/icons/icon-grid-hover.svg" alt="jobBox">
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  @foreach($recruiter as $recruiters)                  
                  <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="card-grid-1 hover-up wow animate__animated animate__fadeIn">
                      <div class="image-box"><a href=""><img width="70px" src="{{ Storage::url($recruiters->picture) }}" alt="jobBox"></a></div>
                      <div class="info-text mt-10">
                        <h5 class="font-bold"><a href="">{{$recruiters->name}}</a></h5>                                     
                        <span class="card-location">{{$recruiters->city}}</span>
                        <div class="mt-30"><a class="btn btn-grey-big" href="{{route('recruiterDetail', $recruiters->id)}}">
                          <span>
                          {{ $recruiters->jobs_count}}
                          </span><span> Lowongan</span></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="paginations my-custom-pagination">
                {{ $recruiter->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>            
          </div>
        </div>
      </section>      
@endsection      