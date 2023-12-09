@extends('layouts.dashboard-app')

@section('content')
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
            <h3 class="mb-35">Resume {{$applier->name}}</h3>
          </div>
          <div class="box-breadcrumb"> 
            <div class="breadcrumbs">
              <ul> 
                <li> <a class="icon-home" href="index.html">Admin</a></li>
                <li><span>Profil {{$applier->name}}</span></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row"> 
          <div class="col-xxl-9 col-xl-8 col-lg-8">
            <div class="section-box">
              <div class="container"> 
                <div class="panel-white mb-30">
                  <div class="box-padding">
                    <h6 class="color-text-paragraph-2">Foto profil</h6>                    
                    <div class="box-profile-image"> 
                      <div class="img-profile"> <img src="{{ Storage::url($applier->picture) }}" alt="jobBox"></div>                                            
                    </div>
                    <input class="form-control" type="hidden" name="id" value="{{ $applier->id }}">
                    <input class="form-control" type="hidden" name="user_id" value="{{ $applier->user_id }}">
                    <div class="row"> 
                    <div class="col-lg-6 col-md-6">
                          <div class="form-group mb-30 {{ $errors->has('name') ? 'has-error' : '' }}">
                              <label class="font-sm color-text mb-10">Nama Lengkap *</label>
                              <input class="form-control" disabled type="text" name="name" placeholder="Steven Curry" value="{{ old('name', $applier->name) }}">                              
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">                        
                        <div class="form-group mb-30 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="font-sm color-text mb-10">Email *</label>
                            <input class="form-control" disabled type="text" name="email" placeholder="Email" value="{{ old('email', $applier->email) }}">
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
                            <input class="form-control" disabled type="text" name="phone_number" placeholder="Nomor Telepon" value="{{ old('phone_number', $applier->phone_number) }}">
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
                            <input class="form-control" disabled type="date" name="birth_date" value="{{ old('birth_date', $applier->birth_date) }}">
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
                          <textarea class="form-control" disabled name="bio" rows="5" placeholder="Biodata">{{ old('bio', $applier->bio) }}</textarea>
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
                          <input class="form-control" disabled type="text" name="experience" placeholder="Pengalaman Kerja" value="{{ old('experience', $applier->experience) }}">
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
                          <input class="form-control" disabled type="text" name="languages" placeholder="Bahasa" value="{{ old('languages', $applier->languages) }}">
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
                          <select class="form-control" disabled name="categories">
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
                          <input class="form-control" disabled type="text" name="country" placeholder="Negara" value="{{ old('country', $applier->country) }}">
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
                          <input class="form-control" disabled type="text" name="city" placeholder="Kota" value="{{ old('city', $applier->city) }}">
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
                          <input class="form-control" disabled type="text" name="address" placeholder="Alamat Lengkap" value="{{ old('address', $applier->address) }}">
                          @if ($errors->has('address'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
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
                          <input class="form-control" disabled type="text" name="facebook" value="{{ $applier->facebook }}">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mb-30">
                          <label class="font-sm color-text mb-10">Twitter</label>
                          <input class="form-control" disabled type="text" name="twitter" value="{{ $applier->twitter }}">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group mb-30">
                          <label class="font-sm color-text mb-10">Instagram</label>
                          <input class="form-control" disabled type="text" name="instagram" value="{{ $applier->instagram }}">
                        </div>
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>                        
          </div>
        </div>
        <div class="row"> 
          <div class="col-lg-12">
            <div class="section-box">
              <div class="container"> 
                <div class="panel-white mb-30">
                  <div class="box-padding">
                    <h5>Lihat CV</h5>
                    <div class="row mt-30">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-30">                                            
                        <!-- <button class="btn btn-tags- mb-10 mr-5" href="{{ Storage::url($applier->resume) }}">Lihat Resume Anda</button> -->
                        @if ($applier->resume == null)
                        Kosong
                        @else
                        <a class="btn btn-success" href="{{ Storage::url($applier->resume) }}"  target="_blank">{{$applier->name}}</a>
                        @endif                        
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-30 d-flex align-items-center box-file-uploaded">
                            <span id="fileName"></span>
                            <a class="btn btn-delete" id="deleteButton" style="display: none;">Delete</a>
                        </div>                                            
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel-white mb-30">
                  <div class="box-padding">
                    <h5 class="icon-edu">Edukasi</h5>
                    <div class="row mt-30">
                      <div class="col-lg-9">                        
                        @foreach($education as $educations)
                        <div class="box-timeline mt-50">
                          <div class="item-timeline"> 
                            @php
                                $startDate = \Carbon\Carbon::parse($educations->start_date)->format('M Y');
                                $endDate = \Carbon\Carbon::parse($educations->end_date)->format('M Y');
                            @endphp

                            <div class="timeline-year">
                                <span>{{$startDate}} - {{$endDate}}</span>
                            </div>

                            <div class="timeline-info"> 
                              <h5 class="color-brand-1 mb-20">{{$educations->name}}</h5>
                              <p class="color-text-paragraph-2 mb-15">{{$educations->description}}</p>
                            </div>
                          </div>                          
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel-white mb-30">
                  <div class="box-padding">
                    <h5 class="icon-edu">Work & Experience</h5>
                    <div class="row mt-30">
                      <div class="col-lg-9">                      
                        @foreach($experience as $experiences)
                        <div class="box-timeline mt-50">
                          <div class="item-timeline"> 
                          @php
                                $startDate = \Carbon\Carbon::parse($experiences->start_date)->format('M Y');
                                $endDate = \Carbon\Carbon::parse($experiences->end_date)->format('M Y');
                            @endphp

                            <div class="timeline-year">
                                <span>{{$startDate}} - {{$endDate}}</span>
                            </div>
                            <div class="timeline-info"> 
                              <h5 class="color-brand-1 mb-20">{{$experiences->name}}</h5>
                              <p class="color-text-paragraph-2 mb-15">{{$experiences->description}}</p>
                            </div>
                            
                          </div>                          
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection      