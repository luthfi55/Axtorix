@extends('layouts.dashboard-app')

@section('content')
      <div class="box-content">
        <div class="box-heading">
          <div class="box-title"> 
            <h3 class="mb-35">Candidates</h3>
          </div>
          <div class="box-breadcrumb"> 
            <div class="breadcrumbs">
              <ul> 
                <li> <a class="icon-home" href="index.html">Admin</a></li>
                <li><span>Candidates</span></li>
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

                    <h2>{{$job->recruiter->name}}</h2>
                    <br>
                    <h2>{{$job->name}}</h2>
                    <br>
                    <h2>Description:</h2>
                    <h5>{{$job->description}}</h5>
                    <br>
                    <h2>Pelamar:</h2>
                    <br>
                    <div class="row">
                      @foreach($applies as $applie)
                      <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="card-grid-2 hover-up">
                          <div class="card-grid-2-image-left">
                            <div class="card-grid-2-image-rd online"><a href="https://wp.alithemes.com/html/jobbox/demos/dashboard/candidate-details.html">
                                <figure><img alt="jobBox" src="/dashboard/assets/imgs/page/candidates/user1.png"></figure></a></div>
                            <div class="card-profile pt-10"><a href="https://wp.alithemes.com/html/jobbox/demos/dashboard/candidate-details.html">
                                <h5>{{$applie->applier->name}}</h5></a><span class="font-xs color-text-mutted">{{$applie->email}}</span><br><span class="font-xs color-text-mutted">{{$applie->phone_number}}</span>                              
                            </div>
                          </div>
                          <div class="card-block-info">
                            <!-- <p class="font-xs color-text-paragraph-2">| Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero repellendus magni, atque delectus molestias quis?</p> -->
                            <div class="card-2-bottom card-2-bottom-candidate mt-30">
                              <div class="text-start"><a class="btn btn-tags-sm mb-10 mr-5" href="{{ route('manager.user-detail', $applie->applier->user_id) }}">Detail</a>
                              <a class="btn btn-tags-sm mb-10 mr-5" href="{{ Storage::url($applie->resume) }}">Unduh Resume</a>
                              <a class="btn btn-tags-sm mb-10 mr-5" href="{{ Storage::url($applie->resume) }}" target="_blank">Lihat Resume</a>                                                                                    
                              <a style="background-color:red; color:white;" class="btn btn-tags-sm mb-10 mr-5" href="https://wp.alithemes.com/html/jobbox/demos/dashboard/jobs-grid.html">Tolak</a>                                                                                      
                              <a style="background-color:green; color:white;" class="btn btn-tags-sm mb-10 mr-5" href="https://wp.alithemes.com/html/jobbox/demos/dashboard/jobs-grid.html">Terima</a>                                                                                      
                              </div>
                            </div>
                            <!-- <div class="employers-info align-items-center justify-content-center mt-15">
                              <div class="row">
                                <div class="col-6"><span class="d-flex align-items-center"><i class="fi-rr-marker mr-5 ml-0"></i><span class="font-sm color-text-mutted"{{$applie->applier->city}}</span></span></div>
                                <div class="col-6"><span class="d-flex justify-content-end align-items-center"><i class="fi-rr-clock mr-5"></i><span class="font-sm color-brand-1">$45 / hour</span></span></div>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>      
                      @endforeach                
                    </div>
                    <div class="paginations">
                      <ul class="pager">
                        <li><a class="pager-prev" href="candidates.html#"></a></li>
                        <li><a class="pager-number" href="candidates.html#">1</a></li>
                        <li><a class="pager-number" href="candidates.html#">2</a></li>
                        <li><a class="pager-number" href="candidates.html#">3</a></li>
                        <li><a class="pager-number" href="candidates.html#">4</a></li>
                        <li><a class="pager-number" href="candidates.html#">5</a></li>
                        <li><a class="pager-number active" href="candidates.html#">6</a></li>
                        <li><a class="pager-number" href="candidates.html#">7</a></li>
                        <li><a class="pager-next" href="candidates.html#"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
@endsection      