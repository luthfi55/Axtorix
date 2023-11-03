@extends('layouts.app')

@section('content')
<main class="main">
      <section class="pt-100 login-register">
        <div class="container"> 
          <div class="row login-register-cover">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
              <div class="text-center">
                <p class="font-sm text-brand-2">Register </p>
                <h2 class="mt-10 mb-5 text-brand-1">Start for free Today</h2>
                <p class="font-sm text-muted mb-30">Access to all features. No credit card required.</p>                                
              </div>              
              <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label class="form-label" for="input-1">Nama Perusahaan *</label>
                  <input class="form-control" id="name" type="text" required="" name="name" placeholder="Nama Perusahaan">
                </div>
                <div class="form-group">
                  <label class="form-label" for="input-1">Deskripsi Perusahaan *</label>
                  <textarea class="form-control" id="description" type="textarea" required="" name="description" placeholder="Deskripsi lengkap"></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="input-3">Nomor Telepon *</label>
                    <input class="form-control" id="phone_number" type="text" required="" name="phone_number" placeholder="0893132131">
                </div>                
                <div class="form-group">
                  <label class="form-label" for="input-1">Kota *</label>
                  <input class="form-control" id="city" type="text" required="" name="city" placeholder="Jakarta">
                </div>
                <div class="form-group">
                  <label class="form-label" for="input-1">Alamat Lengkap *</label>
                  <input class="form-control" id="address" type="text" required="" name="address" placeholder="PIK, Jakarta Utara">
                </div>
                <div class="form-group">
                  <label class="form-label" for="input-2">Email *</label>
                  <input class="form-control" id="email" type="email" required="" name="email" placeholder="stevenjob@gmail.com">
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label class="form-label" for="input-4">Password *</label>
                  <input class="form-control" id="password" type="password" required="" name="password" placeholder="************">
                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                  <label class="form-label" for="input-5">Re-Password *</label>
                  <input class="form-control" id="password-confirm" type="password" required="" name="password_confirmation" placeholder="************">
                </div>
                <input type="hidden" name="role" value="2">
                <!-- <div class="login_footer form-group d-flex justify-content-between">
                  <label class="cb-container">
                    <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
                  </label><a class="text-muted" href="page-contact.html">Lean more</a>
                </div> -->
                <div class="form-group">
                  <button class="btn btn-brand-1 hover-up w-100" type="submit" name="login">Submit &amp; Register</button>
                </div>
                <div class="text-muted text-center">Already have an account? <a href="page-signin.html">Sign in</a></div>
              </form>
            </div>
            <div class="img-1 d-none d-lg-block"><img class="shape-1" src="assets/imgs/page/login-register/img-1.svg" alt="JobBox"></div>
            <div class="img-2"><img src="assets/imgs/page/login-register/img-2.svg" alt="JobBox"></div>
          </div>
        </div>
      </section>
    </main>
    @endsection