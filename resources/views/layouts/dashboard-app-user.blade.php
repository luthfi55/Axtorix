<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="https://wp.alithemes.com/html/jobbox/demos/dashboard/manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/imgs/template/Axtorix_Blue_Title.png">
    <link href="/dashboard/assets/css/style-version=4.1.css" rel="stylesheet">
    <title>Axtorix | @yield('title', 'Default Title')</title>
  </head>
  <body>
    <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
          <div class="text-center"><img src="/dashboard/assets/imgs/template/loading.gif" alt="jobBox"></div>
        </div>
      </div>
    </div>
    <header class="header sticky-bar"> 
      <div class="container">
        <div class="main-header">
          <div class="header-left">
            <div class="header-logo"><a class="d-flex" href="index.html"><img width="200px" alt="jobBox" src="/assets/imgs/template/Axtorix_Blue.png"></a></div>
          </div>
          <!-- <div class="header-search"> 
            <div class="box-search"> 
              <form action="">
                <input class="form-control input-search" type="text" name="keyword" placeholder="Search">
              </form>
            </div>
          </div> -->
          <!-- <div class="header-menu d-none d-md-block">
            <ul> 
              <li>        <a href="../index.html">Home </a></li>
              <li> <a href="../page-about.html">About us </a></li>
              <li> <a href="../page-contact.html">Contact</a></li>
            </ul>
          </div> -->
          <div class="header-right">            
              <!-- <div class="dropdown d-inline-block"><a class="btn btn-notify" id="dropdownNotify" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownNotify">
                  <li><a class="dropdown-item active" href="login.html#">10 notifications</a></li>
                  <li><a class="dropdown-item" href="login.html#">12 messages</a></li>
                  <li><a class="dropdown-item" href="login.html#">20 replies</a></li>
                </ul>
              </div> -->
              <div class="member-login"><img alt="" src="{{ Storage::url($applier->picture) }}">
                <div class="info-member"> <strong class="color-brand-1">{{$applier->name }}</strong>
                  <div class="dropdown"><a class="font-xs color-text-paragraph-2 icon-down" id="dropdownProfile" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">Pengaturan</a>
                    <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownProfile">
                      <!-- <li><a class="dropdown-item" href="profile.html">Profiles</a></li>
                      <li><a class="dropdown-item" href="my-resume.html">CV Manager</a></li> -->
                      <li> <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>                                
                    </li>                                
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
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
                <ul class="main-menu">
                  <li> <a class="dashboard2" href="index.html"><img src="/dashboard/assets/imgs/page/dashboard/dashboard.svg" alt="jobBox"><span class="name">Dashboard</span></a>
                  </li>                  
                  </li>
                  <li> <a class="dashboard2" href="my-job-grid.html"><img src="/dashboard/assets/imgs/page/dashboard/jobs.svg" alt="jobBox"><span class="name">My Jobs</span></a>
                  </li>
                  <li> <a class="dashboard2" href="my-tasks-list.html"><img src="/dashboard/assets/imgs/page/dashboard/tasks.svg" alt="jobBox"><span class="name">Tasks List</span></a>
                  </li>                  
                </ul>
              </nav>
            </div>
            <div class="mobile-account">
              <h6 class="mb-10">Your Account</h6>
              <ul class="mobile-menu font-heading">
                <li><a href="login.html#">Profile</a></li>
                <li><a href="login.html#">Work Preferences</a></li>
                <li><a href="login.html#">Account Settings</a></li>
                <li><a href="login.html#">Go Pro</a></li>
                <li><a href="https://wp.alithemes.com/html/jobbox/demos/dashboard/page-signin.html">Sign Out</a></li>
              </ul>              
            </div>
            <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
          </div>
        </div>
      </div>
    </div>
    
    <main class="main">
    <div class="nav"><a class="btn btn-expanded"></a>
        <nav class="nav-main-menu">
          <ul class="main-menu">
            <li> <a class="dashboard2" href="{{route('home')}}"><img src="/dashboard/assets/imgs/page/dashboard/dashboard.svg" alt="jobBox"><span class="name">Beranda</span></a>
            </li>
            </li>            
            <li> <a class="dashboard2" href="{{route('profile', Auth::user()->id)}}"><img src="/dashboard/assets/imgs/page/dashboard/profiles.svg" alt="jobBox"><span class="name">Profil</span></a>
            </li>            
            <li> <a class="dashboard2" href="{{route('profile-cv', Auth::user()->id)}}"><img src="/dashboard/assets/imgs/page/dashboard/cv-manage.svg" alt="jobBox"><span class="name">Kelola CV</span></a>
            </li>            
            </li>            
          </ul>
        </nav>                
      </div>
    @yield('content')
    <footer class="footer mt-20">
          <div class="container">
            <div class="box-footer">
              <div class="row">
                <div class="col-md-6 col-sm-12 mb-25 text-center text-md-start">
                  <p class="font-sm color-text-paragraph-2">© 2023 - <a class="color-brand-2" href="" target="_blank">Axtorix </p>
                </div>                
              </div>
            </div>
          </div>
        </footer>
      </div>    
    </main>
    <script>
    // Fungsi untuk memperbarui status tombol delete
    function updateDeleteButton() {
        var fileInput = document.getElementById('fileUpload');
        var deleteButton = document.getElementById('deleteButton');
        if (fileInput.value) {
            deleteButton.style.display = 'block';
        } else {
            deleteButton.style.display = 'none';
        }
    }

    // Event listener untuk input file
    document.getElementById('fileUpload').addEventListener('change', function(event) {
        var fileName = event.target.files[0] ? event.target.files[0].name : "";
        document.getElementById('fileName').textContent = fileName;
        updateDeleteButton();
    });

    // Event listener untuk tombol delete
    document.getElementById('deleteButton').addEventListener('click', function() {
        var fileInput = document.getElementById('fileUpload');
        fileInput.value = "";
        document.getElementById('fileName').textContent = "";
        updateDeleteButton();
    });
    </script>


    <script src="/dashboard/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/dashboard/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/dashboard/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/dashboard/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/dashboard/assets/js/plugins/waypoints.js"></script>
    <script src="/dashboard/assets/js/plugins/magnific-popup.js"></script>
    <script src="/dashboard/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/dashboard/assets/js/plugins/select2.min.js"></script>
    <script src="/dashboard/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/dashboard/assets/js/plugins/jquery.circliful.js"></script>
    <script src="/dashboard/assets/js/main-v=4.1.js"></script>
  </body>
</html>