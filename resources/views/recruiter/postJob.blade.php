@extends('layouts.dashboard-app')

@section('title', 'Unggah Lowongan')

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
            <h3 class="mb-35">Unggah Lowongan</h3>
          </div>
          <div class="box-breadcrumb"> 
            <div class="breadcrumbs">
              <ul> 
                <li> <a class="icon-home" href="index.html">Manager</a></li>
                <li><span>Unggah Lowongan</span></li>
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
                    <h5 class="">Masukkan Deskripsi Lowongan</h5>
                    <form class="" method="POST" action="{{ route('manager.create-job') }}">
                    @csrf
                    <div class="row mt-30">
                      <div class="col-lg-9">
                        <div class="row">
                        <input type="hidden" name="recruiter_id" value="{{ Auth::user()->id }}">
                          <div class="col-lg-12">
                            <div class="form-group mb-30" {{ $errors->has('name') ? 'has-error' : '' }}>                                                     
                              <label class="font-sm color-text-mutted mb-10">Judul Lowongan *</label>
                              <input name="name" class="form-control" type="text" placeholder="e.g. Senior Product Designer">
                              @if ($errors->has('name'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group mb-30" {{ $errors->has('type') ? 'has-error' : '' }}>
                              <label class="font-sm color-text-mutted mb-10">Jenis Lowongan *</label>
                              <select name="type" class="form-control">
                                <option value="" disabled selected hidden>Pilih Kategori</option>
                                <option value="film">Film</option>
                                <option value="film-pendek">Film Pendek</option>
                                <option value="teater">Teater</option>
                                <option value="iklan">Iklan</option>
                              </select>
                              @if ($errors->has('type'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('type') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>
                          <div class="col-lg-12"> 
                            <div class="form-group mb-30" {{ $errors->has('description') ? 'has-error' : '' }}> 
                              <label class="font-sm color-text-mutted mb-10">Tambahkan Deskripsi Lowongan *</label>
                              <textarea class="form-control" name="description" rows="8"> </textarea>
                              @if ($errors->has('description'))
                              <span class="help-block error-message">
                                  <strong>{{ $errors->first('description') }}</strong>
                              </span>
                              @endif 
                            </div>
                          </div>
                          <div class="col-lg-12"> 
                            <div class="form-group mb-30"> 
                              <label class="font-sm color-text-mutted mb-10">Tambahkan Deskripsi Vidio yang Dibutuhkan (Tidak Wajib)</label>
                              <textarea class="form-control" name="required_vidio" rows="4"> </textarea>
                            </div>
                          </div>
                          <input type="hidden" name="status" value="1">
                          <!-- <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-30"> 
                              <label class="font-sm color-text-mutted mb-10">Job location</label>
                              <input class="form-control" type="text" placeholder="e.g. &quot;New York City&quot; or &quot;San Francisco”">
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-30">
                              <label class="font-sm color-text-mutted mb-10">Workplace type *</label>
                              <select class="form-control">
                                <option value="1">Remote</option>
                                <option value="1">Office</option>
                              </select>
                            </div>
                          </div> -->                          
                          <!-- <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-30">
                              <div class="box-upload">
                                <div class="add-file-upload">
                                  <input class="fileupload" type="file" name="file">
                                </div><a class="btn btn-default">Upload File</a>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-30 box-file-uploaded d-flex align-items-center"><span>Job_required.pdf</span><a class="btn btn-delete">Delete</a></div>
                          </div> -->
                          <div class="col-lg-12"> 
                            <div class="form-group mt-10">
                              <button class="btn btn-default btn-brand icon-tick">Unggah Lowongan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>            
@endsection