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
                              <input name="phone_number" class="form-control" type="text" placeholder="e.g. Senior Product Designer" value="{{$recruiter->phone_number}}">
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
                              <input name="city" class="form-control" type="text" placeholder="e.g. Senior Product Designer" value="{{$recruiter->city}}">
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
                              <input name="address" class="form-control" type="text" placeholder="e.g. Senior Product Designer" value="{{$recruiter->address}}">
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
@endsection