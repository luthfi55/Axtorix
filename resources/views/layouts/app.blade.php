<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="https://wp.alithemes.com/html/jobbox/demos/manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/imgs/template/Axtorix_Blue_Title.png">
    <link href="/assets/css/style-version=4.1.css" rel="stylesheet">
    <title>Axtorix | @yield('title', 'Default Title')</title>
  </head>
  <body>
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="text-center"><img src="/assets/imgs/template/loading.gif" alt="jobBox"></div>
        </div>
      </div>
    </div>
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
                </label><a class="text-muted" href="page-contact.html">Lean more</a>
              </div>
              <div class="form-group">
                <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
              </div>
              <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact Us</a></div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <header class="header sticky-bar">
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class="d-flex" href="/"><img width="150px" alt="jobBox" src="/assets/imgs/template/Axtorix_Blue.png"></a></div>
          </div>
          <div class="header-nav">
            <nav class="nav-main-menu">
              <ul class="main-menu">
                <!-- <li class="has-children"><a class="active" href="index.html">Home</a>
                  <ul class="sub-menu">
                    <li><a href="index.html">Home 1</a></li>
                    <li><a href="index-2.html">Home 2</a></li>
                    <li><a href="index-3.html">Home 3</a></li>
                    <li><a href="index-4.html">Home 4</a></li>
                    <li><a href="index-5.html">Home 5</a></li>
                    <li><a href="index-6.html">Home 6</a></li>
                  </ul>
                </li> -->
                <li class=""><a href="/list-job">Daftar Lowongan</a></li>
                <li class=""><a href="/list-recruiter">Daftar Recruiter</a>                  
                @if(auth()->check())
                  @if(auth()->user()->role == "user")                              
                  <li class=""><a href="{{ route('status', Auth::user()->id) }}">Status Lamaran</a></li>
                  @elseif(auth()->user()->role == "admin")
                  @elseif(auth()->user()->role == "manager")                           
                  @else                                
                  @endif 
                @else
                @endif                                
                </li>
                <!-- <li class="has-children"><a href="candidates-grid.html">Tips Melamar</a>
                  <ul class="sub-menu">
                    <li><a href="candidates-grid.html">Candidates Grid</a></li>
                    <li><a href="candidate-details.html">Candidate Details</a></li>
                    <li><a href="candidate-profile.html">Candidate Profile</a></li>
                  </ul>
                </li>                 -->
                @if(auth()->check())
                  @if(auth()->user()->role == "user")                              
                  <!-- <li style="backgorund-color:black;" class="dashboard"><a href="{{ route('profile', Auth::user()->id) }}">Perlengkap Data Diri</a></li>                   -->
                  @elseif(auth()->user()->role == "admin")
                  @elseif(auth()->user()->role == "manager")         
                  <li class=""><a href="{{route('manager.manage-job')}}">Halaman Manajemen</a>
                  <li style="backgorund-color:black;" class="dashboard"><a href="manager/post-job">Unggah Lowongan</a></li>
                  @else                                
                  @endif 
                @else
                @endif
              </ul>
            </nav>
            <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
          </div>
          <div class="header-right">
            <div class="block-signin">
            @guest
                            @if (Route::has('login'))
                            <a class="text-link-bd-btom hover-up" href="/register">Daftar</a>
                            @endif

                            @if (Route::has('register'))                                
                                <a class="btn btn-default btn-shadow ml-40 hover-up" href="/login">Masuk</a>                                
                            @endif                            
                            @else 
                            @if(auth()->user()->role == "user")                           
                            <div style="position: relative; "> <!-- Set the height of the parent container as needed -->
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
                                      <span class="me-2">{{$applier->name}}</span>
                                      <img alt="" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" src="{{ Storage::url($applier->picture) }}">
                                  </a>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('profile', Auth::user()->id) }}">Profil</a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                      {{ __('Keluar') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                            </div>
                            @else
                            <div style="position: relative; "> <!-- Set the height of the parent container as needed -->
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: absolute; right: 0; top: 50%; transform: translateY(-50%);">
                                      <span class="me-2">{{$recruiterData->name}}</span>
                                      <img alt="" class="rounded-circle" style="width: 40px; height: 40px; object-fit: cover;" src="{{ Storage::url($recruiterData->picture) }}">
                                  </a>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('manager.edit-profile', Auth::user()->id)}}">Profil</a>
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                      {{ __('Keluar') }}
                                  </a>
                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                            </div>
                            @endif
                      
                        @endguest                            
          </div>    
          </div>
        </div>
      </div>
    </header>    
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
      <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
          <div class="perfect-scroll">
            <div class="mobile-search mobile-header-border mb-30">
              <form action="#">
                <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
              </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
              <!-- mobile menu start-->
              <nav>
                <ul class="mobile-menu font-heading">
                  <!-- <li class="has-children"><a class="active" href="index.html">Home</a>
                    <ul class="sub-menu">
                      <li><a href="index.html">Home 1</a></li>
                      <li><a href="index-2.html">Home 2</a></li>
                      <li><a href="index-3.html">Home 3</a></li>
                      <li><a href="index-4.html">Home 4</a></li>
                      <li><a href="index-5.html">Home 5</a></li>
                      <li><a href="index-6.html">Home 6</a></li>
                    </ul>
                  </li> -->
                  <li class="has-children"><a href="/list-job">Daftar Lowongan</a>                    
                  </li>
                  <li class="has-children"><a href="/list-recruiter">Daftar Recruiter</a>                    
                  </li>
                  <!-- <li class="has-children"><a href="candidates-grid.html">Tips Melamar</a>                   -->
                  </li>
                  <!-- <li class="has-children"><a href="blog-grid.html">Pages</a>
                    <ul class="sub-menu">
                      <li><a href="page-about.html">About Us</a></li>
                      <li><a href="page-pricing.html">Pricing Plan</a></li>
                      <li><a href="page-contact.html">Contact Us</a></li>
                      <li><a href="/register">Register</a></li>
                      <li><a href="page-signin.html">Signin</a></li>
                      <li><a href="page-reset-password.html">Reset Password</a></li>
                      <li><a href="page-content-protected.html">Content Protected</a></li>
                    </ul>
                  </li>                   -->
                  <li><a href="{{route('home')}}">Beranda</a></li>
                </ul>
              </nav>
            </div>            
            <div class="mobile-account">
              <h6 class="mb-10">Your Account</h6>
              <ul class="mobile-menu font-heading">
              @guest
                @if (Route::has('login'))
                  <li><a href="/register">Daftar</a></li>
                @endif
                  @if (Route::has('register'))                                
                    <li><a href="/login">Masuk</a></li>
                  @endif
              @else                                                                  
                  @if(auth()->check())
                    @if(auth()->user()->role == "user")                              
                    <li><a href="{{ route('profile', Auth::user()->id) }}">Profil</a></li>
                    <li><a href="page-signin.html#">Kelola CV</a></li>
                    <li><a href="page-signin.html#">Status Lamaran</a></li>                  
                    <li><a href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Keluar') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                    </li>                       
                    @elseif(auth()->user()->role == "admin")
                    @elseif(auth()->user()->role == "manager")         
                    <li class=""><a href="{{route('manager.manage-job')}}">Halaman Manajemen</a>
                    <li style="backgorund-color:black;" class="dashboard"><a href="manager/post-job" target="_blank">Unggah Lowongan</a></li>                                        
                    @else                                
                    @endif 
                    @else
                  @endif                            
                @endguest                          
              </ul>
            </div>
            <div class="site-copyright">Copyright 2023 &copy; Axtorix.</div>
          </div>
        </div>
      </div>
    </div>

    <main class="main">
    @yield('content')
    </main>
    
    <footer class="footer mt-30 mb-30">
      <div class="container">
        <!-- <div class="row">
          <div class="footer-col-1 col-md-3 col-sm-12"><a href="/"><img width="200px" alt="jobBox" src="/assets/imgs/template/Axtorix_Blue.png"></a>
            <div class="mt-20 mb-20 font-xs color-text-paragraph-2">JobBox is the heart of the design community and the best resource to discover and connect with designers and jobs worldwide.</div>
            <div class="footer-social"><a class="icon-socials icon-facebook" href="page-signin.html#"></a><a class="icon-socials icon-twitter" href="page-signin.html#"></a><a class="icon-socials icon-linkedin" href="page-signin.html#"></a></div>
          </div>
          <div class="footer-col-2 col-md-2 col-xs-6">
            <h6 class="mb-20">Resources</h6>
            <ul class="menu-footer">
              <li><a href="page-signin.html#">About us</a></li>
              <li><a href="page-signin.html#">Our Team</a></li>
              <li><a href="page-signin.html#">Products</a></li>
              <li><a href="page-signin.html#">Contact</a></li>
            </ul>
          </div>
          <div class="footer-col-3 col-md-2 col-xs-6">
            <h6 class="mb-20">Community</h6>
            <ul class="menu-footer">
              <li><a href="page-signin.html#">Feature</a></li>
              <li><a href="page-signin.html#">Pricing</a></li>
              <li><a href="page-signin.html#">Credit</a></li>
              <li><a href="page-signin.html#">FAQ</a></li>
            </ul>
          </div>
          <div class="footer-col-4 col-md-2 col-xs-6">
            <h6 class="mb-20">Quick links</h6>
            <ul class="menu-footer">
              <li><a href="page-signin.html#">iOS</a></li>
              <li><a href="page-signin.html#">Android</a></li>
              <li><a href="page-signin.html#">Microsoft</a></li>
              <li><a href="page-signin.html#">Desktop</a></li>
            </ul>
          </div>
          <div class="footer-col-5 col-md-2 col-xs-6">
            <h6 class="mb-20">More</h6>
            <ul class="menu-footer">
              <li><a href="page-signin.html#">Privacy</a></li>
              <li><a href="page-signin.html#">Help</a></li>
              <li><a href="page-signin.html#">Terms</a></li>
              <li><a href="page-signin.html#">FAQ</a></li>
            </ul>
          </div>
          <div class="footer-col-6 col-md-3 col-sm-12">
            <h6 class="mb-20">Download App</h6>
            <p class="color-text-paragraph-2 font-xs">Download our Apps and get extra 15% Discount on your first Order&mldr;!</p>
            <div class="mt-15"><a class="mr-5" href="page-signin.html#"><img src="/assets/imgs/template/icons/app-store.png" alt="joxBox"></a><a href="page-signin.html#"><img src="/assets/imgs/template/icons/android.png" alt="joxBox"></a></div>
          </div>
        </div> -->        
          <div class="row">
            <div class="col-md-6"><span class="font-xs color-text-paragraph">Copyright 2023 &copy; Axtorix</span></div>
            <div class="col-md-6 text-md-end text-start">
              <div class="footer-social"><a class="font-xs color-text-paragraph" href="">Privacy Policy</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="">Terms &amp; Conditions</a><a class="font-xs color-text-paragraph" href="">Security</a></div>
            </div>
          </div>        
      </div>
    </footer>
    <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/plugins/waypoints.js"></script>
    <script src="/assets/js/plugins/wow.js"></script>
    <script src="/assets/js/plugins/magnific-popup.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/select2.min.js"></script>
    <script src="/assets/js/plugins/isotope.js"></script>
    <script src="/assets/js/plugins/scrollup.js"></script>
    <script src="/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/assets/js/main-v=4.1.js"></script>
  </body>
</html>