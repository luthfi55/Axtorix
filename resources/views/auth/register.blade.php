@extends('layouts.app')

@section('title', 'Registrasi')

@section('content')
<main class="main">
      <section class="pt-100 login-register">
        <div class="container"> 
          <div class="row login-register-cover">
            <div class="col-lg-4 col-md-6 col-sm-12 mx-auto">
              <div class="text-center">
                <p class="font-sm text-brand-2">Selamat datang! </p>
                <h2 class="mt-10 mb-5 text-brand-1">Registrasi</h2>
                
                <a href="/recruit-register" ><button class="btn social-login hover-up mt-30 mb-20"><strong>Daftar sebagai recruiter </strong></button></a>
                <div class="divider-text-center"><span>Atau daftar sebagai pengguna</span></div>
              </div>              
              <form class="login-register text-start mt-20" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Nama Lengkap*</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" placeholder="Steven Job" value="{{ old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Tanggal Lahir -->
                <div class="form-group">
                    <label class="form-label" for="birth_date">Tanggal Lahir *</label>
                    <input class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" type="date" name="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label class="form-label" for="phone_number">Nomor Telepon *</label>
                    <input class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" type="text" name="phone_number" placeholder="08123456789" value="{{ old('phone_number') }}">
                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Email *</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="stevenjob@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label class="form-label" for="password">Kata Sandi *</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="************">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Ulang Kata Sandi -->
                <div class="form-group">
                    <label class="form-label" for="password-confirm">Ulang Kata Sandi *</label>
                    <input class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" type="password" name="password_confirmation" placeholder="************">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input type="hidden" name="role" value="0">
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
            
            <div class="mb-4" ></div>
          </div>
        </div>
      </section>
    </main>
    @endsection