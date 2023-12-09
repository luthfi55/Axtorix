@extends('layouts.dashboard-app-user')

@section('title', 'Profil')

@section('content')
<style>
    .error-message {
        color: red; /* Warna merah untuk pesan error */
        font-size: 0.9em; /* Ukuran font yang lebih kecil */
        margin-top: 5px; /* Jarak antara input dan pesan error */
    }
</style>
      <div class="box-content">
      @if (session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
        @elseif (session('success-education'))
            <div class="alert alert-success">
              {{ session('success-education') }}
            </div>
        @endif
        <div class="box-heading">
          <div class="box-title"> 
            <h3 class="mb-35">Profil Saya</h3>
          </div>         
        </div>
        <div class="row"> 
          <div class="col-xxl-9 col-xl-8 col-lg-8">
            <div class="section-box">
              <div class="container"> 
                <div class="panel-white mb-30">
                  <div class="box-padding">
                    <h6 class="color-text-paragraph-2">Perbarui profil anda</h6>
                    <form class="" action="{{ route('update-applier') }}" method="POST">
                      @csrf
                      <input type="hidden" name="_method" value="PUT">
                    <div class="box-profile-image"> 
                      <div class="img-profile"> <img src="{{ Storage::url($applier->picture) }}" alt="jobBox"></div>                      
                      <div class="info-profile"> <a class="btn btn-default" data-bs-toggle="modal" data-bs-target="#ModalPicture">Ubah Foto Profil</a></div>
                    </div>
                    <input class="form-control" type="hidden" name="id" value="{{ $applier->id }}">
                    <input class="form-control" type="hidden" name="user_id" value="{{ $applier->user_id }}">
                    <div class="row"> 
                    <div class="col-lg-6 col-md-6">
                          <div class="form-group mb-30 {{ $errors->has('name') ? 'has-error' : '' }}">
                              <label class="font-sm color-text mb-10">Nama Lengkap *</label>
                              <input class="form-control" type="text" name="name" placeholder="Steven Curry" value="{{ old('name', $applier->name) }}">
                              @if ($errors->has('name'))
                                  <span class="help-block error-message">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">                        
                        <div class="form-group mb-30 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="font-sm color-text mb-10">Email *</label>
                            <input class="form-control" type="text" name="email" placeholder="Email" value="{{ old('email', $applier->email) }}">
                            @if ($errors->has('email'))
                                <span class="help-block error-message">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <!-- Nomor Telepon -->
                        <div class="form-group mb-30 {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <label class="font-sm color-text mb-10">Nomor Telepon</label>
                            <input class="form-control" type="text" name="phone_number" placeholder="Nomor Telepon" value="{{ old('phone_number', $applier->phone_number) }}">
                            @if ($errors->has('phone_number'))
                                <span class="help-block error-message">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <!-- Tanggal Lahir -->
                        <div class="form-group mb-30 {{ $errors->has('birth_date') ? 'has-error' : '' }}">
                            <label class="font-sm color-text mb-10">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="birth_date" value="{{ old('birth_date', $applier->birth_date) }}">
                            @if ($errors->has('birth_date'))
                                <span class="help-block error-message">
                                    <strong>{{ $errors->first('birth_date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12"> 
                      <!-- Biodata -->
                      <div class="form-group mb-30 {{ $errors->has('bio') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Biodata</label>
                          <textarea class="form-control" name="bio" rows="5" placeholder="Biodata">{{ old('bio', $applier->bio) }}</textarea>
                          @if ($errors->has('bio'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('bio') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <!-- Pengalaman Kerja -->
                      <div class="form-group mb-30 {{ $errors->has('experience') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Pengalaman Kerja</label>
                          <input class="form-control" type="text" name="experience" placeholder="Pengalaman Kerja" value="{{ old('experience', $applier->experience) }}">
                          @if ($errors->has('experience'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('experience') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <!-- Bahasa -->
                      <div class="form-group mb-30 {{ $errors->has('languages') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Bahasa</label>
                          <input class="form-control" type="text" name="languages" placeholder="Bahasa" value="{{ old('languages', $applier->languages) }}">
                          @if ($errors->has('languages'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('languages') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-lg-12">
                      <!-- Keahlian Utama -->
                      <div class="form-group mb-30 {{ $errors->has('categories') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Keahlian Utama</label>
                          <select class="form-control" name="categories">
                              <option value="" disabled selected hidden>Pilih Kategori</option>
                              <option value="film" {{ $applier->categories == 'film' ? 'selected' : '' }}>Film</option>
                                  <option value="film-pendek" {{ $applier->categories == 'film-pendek' ? 'selected' : '' }}>Film Pendek</option>
                                  <option value="teater" {{ $applier->categories == 'teater' ? 'selected' : '' }}>Teater</option>
                                  <option value="iklan" {{ $applier->categories == 'iklan' ? 'selected' : '' }}>Iklan</option>
                            </select>
                          @if ($errors->has('categories'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('categories') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <!-- Negara -->
                      <div class="form-group mb-30 {{ $errors->has('country') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Negara</label>
                          <input class="form-control" type="text" name="country" placeholder="Negara" value="{{ old('country', $applier->country) }}">
                          @if ($errors->has('country'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('country') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                      <!-- Kota -->
                      <div class="form-group mb-30 {{ $errors->has('city') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Kota</label>
                          <input class="form-control" type="text" name="city" placeholder="Kota" value="{{ old('city', $applier->city) }}">
                          @if ($errors->has('city'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('city') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-lg-12">
                      <!-- Alamat Lengkap -->
                      <div class="form-group mb-30 {{ $errors->has('address') ? 'has-error' : '' }}">
                          <label class="font-sm color-text mb-10">Alamat Lengkap</label>
                          <input class="form-control" type="text" name="address" placeholder="Alamat Lengkap" value="{{ old('address', $applier->address) }}">
                          @if ($errors->has('address'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="col-lg-12"> 
                        <div class="form-group mt-10">
                          <button class="btn btn-default btn-brand icon-tick" type="submit">Simpan</button>
                        </div>
                      </div>
                    </div>                    
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-lg-4">
            <div class="section-box">
              <div class="container"> 
                <div class="panel-white">
                  <div class="panel-head"> 
                    <h5>Media Sosial</h5>
                  </div>
                  <div class="panel-body pt-20">
                    <div class="row">
                      <div class="col-lg-12"> 
                        <div class="form-group mb-30"> 
                          <label class="font-sm color-text mb-10">Facebook</label>
                          <input class="form-control" type="text" name="facebook" value="{{ $applier->facebook }}" placeholder="https://www.facebook.com">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mb-30">
                          <label class="font-sm color-text mb-10">Twitter</label>
                          <input class="form-control" type="text" name="twitter" value="{{ $applier->twitter }}" placeholder="https://twitter.com">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mb-30">
                          <label class="font-sm color-text mb-10">Instagram</label>
                          <input class="form-control" type="text" name="instagram" value="{{ $applier->instagram }}" placeholder="https://www.instagram.com">
                        </div>
                      </div>
                      <div class="col-lg-12"> 
                        <div class="form-group mt-0">
                          <button class="btn btn-default btn-brand icon-tick" type="submit">Simpan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- <div class="section-box">
              <div class="container"> 
                <div class="panel-white">
                  <div class="panel-head"> 
                    <h5>My Skill</h5><a class="menudrop" id="dropdownMenu3" type="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static"></a>
                    <ul class="dropdown-menu dropdown-menu-light dropdown-menu-end" aria-labelledby="dropdownMenu3">
                      <li><a class="dropdown-item active" href="profile.html#">Add new</a></li>
                      <li><a class="dropdown-item" href="profile.html#">Settings</a></li>
                      <li><a class="dropdown-item" href="profile.html#">Actions</a></li>
                    </ul>
                  </div>
                  <div class="panel-body pt-20">
                    <div class="row">
                      <div class="col-lg-12"> 
                        <div class="form-group mb-30"> 
                          <input class="form-control icon-search-right" type="text" placeholder="E.g. Angular, Laravel...">
                        </div>
                      </div>
                      <div class="col-lg-12"> 
                        <div class="mb-20"><a class="btn btn-tag tags-link">Figma<span></span></a><a class="btn btn-tag tags-link">Adobe XD<span></span></a><a class="btn btn-tag tags-link">NextJS<span></span></a><a class="btn btn-tag tags-link">React<span></span></a><a class="btn btn-tag tags-link">App<span></span></a><a class="btn btn-tag tags-link">Digital<span></span></a><a class="btn btn-tag tags-link">NodeJS<span></span></a></div>
                        <div class="mt-30 mb-40"> <span class="info-icon font-sm color-text-paragraph-2">You can add up to 15 skills</span></div>
                      </div>
                      <div class="col-lg-12"> 
                        <div class="form-group mt-0">
                          <button class="btn btn-default btn-brand icon-tick">Simpan</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>



        <div class="modal fade" id="ModalPicture" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content apply-job-form">
                                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  <div class="modal-body pl-30 pr-30 pt-50">                                                                              
                                    <div class="text-center">
                                      <!-- <p class="font-sm text-brand-2">Perbarui Foto Profil </p> -->
                                      <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Perbarui Foto Profil</h2>
                                      <p class="font-sm text-muted mb-30">Foto profil sangat berpengaruh untuk menilai wajah dan penampilan anda.</p>
                                    </div>                                              
                                    <form class="" action="{{ route('update-picture') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                    <input type="hidden" name="_method" value="PUT">                    
                                    <input class="form-control" type="hidden" name="id" value="{{ $applier->id }}">
                                    <input class="form-control" type="hidden" name="user_id" value="{{ $applier->user_id }}">                                                                                                                        
                                      <div class="form-group">
                                        <label class="form-label" for="file">Unggah Foto *</label>
                                        <input class="form-control" id="file" name="picture" type="file" accept="image/*">
                                      </div>                                                                        
                                      <div class="form-group">
                                        <button class="btn btn-default hover-up w-100" type="submit">Ubah Foto Profil</button>
                                      </div>                                      
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>   
        @endsection