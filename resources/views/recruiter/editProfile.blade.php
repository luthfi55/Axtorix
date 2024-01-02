@extends('layouts.dashboard-app')

@section('title', 'Profil Recruiter')

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
            <h3 class="mb-35">Ubah Profil</h3>
          </div>
          <div class="box-breadcrumb"> 
            <div class="breadcrumbs">
              <ul> 
                <li> <a class="icon-home" href="index.html">Manager</a></li>
                <li><span>Ubah Profil</span></li>
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
                    <h5 class="">Profil</h5>
                    <form class="" method="POST" action="{{ route('manager.update-profile')}}">
                    @csrf
                    <div class="box-profile-image"> 
                      <div class="img-profile"> <img src="{{ Storage::url($recruiter->picture) }}" alt="jobBox"></div>                      
                      <div class="info-profile"> <a class="btn btn-default" data-bs-toggle="modal" data-bs-target="#ModalPicture">Ubah Foto Profil</a></div>
                    </div>                    
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row mt-30">
                      <div class="col-lg-9">
                        <div class="row">
                        <input type="hidden" name="id" value="{{$recruiter->id}}">                                                                    
                          <div class="col-lg-12">
                            <div class="form-group mb-30" {{ $errors->has('name') ? 'has-error' : '' }}>                                                     
                              <label class="font-sm color-text-mutted mb-10">Nama Perusahaan</label>
                              <input name="name" class="form-control" type="text" value="{{$recruiter->name}}">
                              @if ($errors->has('name'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>
                          <div class="col-lg-12"> 
                            <div class="form-group mb-30" {{ $errors->has('description') ? 'has-error' : '' }}> 
                              <label class="font-sm color-text-mutted mb-10">Deskripsi *</label>
                              <textarea class="form-control" name="description" rows="8">{{$recruiter->description}} </textarea>
                              @if ($errors->has('description'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                              @endif 
                            </div>
                          <div class="col-lg-12">
                            <div class="form-group mb-30" {{ $errors->has('phone_number') ? 'has-error' : '' }}>                                                     
                              <label class="font-sm color-text-mutted mb-10">Nomor Telepon</label>
                              <input name="phone_number" class="form-control" type="text" placeholder="" value="{{$recruiter->phone_number}}">
                              @if ($errors->has('phone_number'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('phone_number') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group mb-30" {{ $errors->has('city') ? 'has-error' : '' }}>                                                     
                              <label class="font-sm color-text-mutted mb-10">Kota</label>
                              <input name="city" class="form-control" type="text" placeholder="" value="{{$recruiter->city}}">
                              @if ($errors->has('city'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('city') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>                          
                          <div class="col-lg-12">
                            <div class="form-group mb-30" {{ $errors->has('address') ? 'has-error' : '' }}>                                                     
                              <label class="font-sm color-text-mutted mb-10">Alamat Lengkap</label>
                              <input name="address" class="form-control" type="text" placeholder="" value="{{$recruiter->address}}">
                              @if ($errors->has('address'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>                                                    
                          <div class="col-lg-12"> 
                            <div class="form-group mt-10">
                              <button class="btn btn-default btn-brand icon-tick" type="submit">Simpan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
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
                                    <form class="" action="{{ route('manager.update-picture') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                    <input type="hidden" name="_method" value="PUT">                    
                                    <input class="form-control" type="hidden" name="id" value="{{ $recruiter->id }}">
                                    <input class="form-control" type="hidden" name="user_id" value="{{ $recruiter->user_id }}">                                                                                                                        
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