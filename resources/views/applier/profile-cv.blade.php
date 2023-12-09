@extends('layouts.dashboard-app-user')

@section('title', 'Kelola CV')

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
            <h3 class="mb-35">Resume Saya</h3>
          </div>
          <div class="box-breadcrumb"> 
            <div class="breadcrumbs">
              <ul> 
                <li> <a class="icon-home" href="index.html">Admin</a></li>
                <li><span>Resume Saya</span></li>
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
                    <h5>Perbarui CV Anda</h5>
                    <div class="row mt-30">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group mb-30">                                            
                        <!-- <button class="btn btn-tags- mb-10 mr-5" href="{{ Storage::url($applier->resume) }}">Lihat Resume Anda</button> -->
                        @if ($applier->resume == null)
                        @else
                        <a class="btn btn-success mb-20" href="{{ Storage::url($applier->resume) }}"  target="_blank">Lihat CV Anda</a>
                        @endif
                        <form class="" action="{{ route('update-resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-upload">
                            <div class="add-file-upload">
                                <input class="form-control" type="hidden" name="id" value="{{ $applier->id }}">
                                <input class="form-control" type="hidden" name="user_id" value="{{ $applier->user_id }}">    
                                <input class="fileupload" type="file" name="resume" id="fileUpload" accept="application/pdf">                                
                            </div>
                            <button class="btn btn-default" type="submit">Upload File</button>
                        </div>
                        @if ($errors->has('resume'))
                                    <span class="help-block error-message">
                                        <strong>{{ $errors->first('resume') }}</strong>
                                    </span>
                        @endif
                        </form>
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
                        <form class="" action="{{ route('create-education') }}" method="POST">
                        @csrf
                        <input class="form-control" type="hidden" name="user_id" value="{{ $applier->user_id }}">    
                        <div class="row">
                          <div class="col-lg-6 col-md-6">
                          <div class="form-group mb-30 {{ $errors->has('start_date') ? 'has-error' : '' }}">
                              <label class="font-sm color-text-mutted mb-10">Dari</label>
                              <input class="form-control" type="date" data-date-format="DD MMMM YYYY" name="start_date">
                              @if ($errors->has('start_date'))
                                  <span class="help-block error-message">
                                      <strong>{{ $errors->first('start_date') }}</strong>
                                  </span>
                              @endif
                          </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                              <div class="form-group mb-30 {{ $errors->has('end_date') ? 'has-error' : '' }}">
                                  <label class="font-sm color-text-mutted mb-10">Sampai</label>
                                  <input class="form-control" type="date" data-date-format="DD MMMM YYYY" name="end_date">
                                  @if ($errors->has('end_date'))
                                      <span class="help-block error-message">
                                          <strong>{{ $errors->first('end_date') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group mb-30 {{ $errors->has('name') ? 'has-error' : '' }}">
                                  <label class="font-sm color-text-mutted mb-10">Nama Sekolah/Kampus</label>
                                  <input class="form-control" type="text" name="name" placeholder="Telkom University">
                                  @if ($errors->has('name'))
                                      <span class="help-block error-message">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group mb-30 {{ $errors->has('description') ? 'has-error' : '' }}">
                                  <label class="font-sm color-text-mutted mb-10">Deskripsi</label>
                                  <textarea class="form-control" name="description" rows="5" placeholder="Deskripsi Anda"></textarea>
                                  @if ($errors->has('description'))
                                      <span class="help-block error-message">
                                          <strong>{{ $errors->first('description') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-12"> 
                            <div class="form-group mt-10">
                              <button class="btn btn-default btn-brand icon-tick" type="submit">Tambah Edukasi</button>
                            </div>
                          </div>
                        </div>
                        </form>
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
                            <div class="timeline-actions"> <a class="btn btn-editor"></a>
                            <form action="{{ route('delete-education', $educations->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-remove" type="submit"></button></div>
                            </form>

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
                      <form class="" action="{{ route('create-experience') }}" method="POST">
                        @csrf
                        <input class="form-control" type="hidden" name="user_id" value="{{ $applier->user_id }}">    
                        <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-30 {{ $errors->has('start_date') ? 'has-error' : '' }}">
                                <label class="font-sm color-text-mutted mb-10">Dari</label>
                                <input class="form-control" type="date" data-date-format="DD MMMM YYYY" name="start_date">
                                @if ($errors->has('start_date'))
                                    <span class="help-block error-message">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-6">
                              <div class="form-group mb-30 {{ $errors->has('end_date') ? 'has-error' : '' }}">
                                  <label class="font-sm color-text-mutted mb-10">Sampai</label>
                                  <input class="form-control" type="date" data-date-format="DD MMMM YYYY" name="end_date">
                                  @if ($errors->has('end_date'))
                                      <span class="help-block error-message">
                                          <strong>{{ $errors->first('end_date') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group mb-30 {{ $errors->has('name') ? 'has-error' : '' }}">
                                  <label class="font-sm color-text-mutted mb-10">Nama Perusahaan</label>
                                  <input class="form-control" type="text" name="name" placeholder="Trans Media">
                                  @if ($errors->has('name'))
                                      <span class="help-block error-message">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-12">
                              <div class="form-group mb-30 {{ $errors->has('description') ? 'has-error' : '' }}">
                                  <label class="font-sm color-text-mutted mb-10">Deskripsi</label>
                                  <textarea class="form-control" name="description" rows="5" placeholder="Deskripsi Anda"></textarea>
                                  @if ($errors->has('description'))
                                      <span class="help-block error-message">
                                          <strong>{{ $errors->first('description') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-lg-12"> 
                            <div class="form-group mt-10">
                              <button class="btn btn-default btn-brand icon-tick" type="submit">Tambah Edukasi</button>
                            </div>
                          </div>
                        </div>
                        </form>
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
                            <div class="timeline-actions"> <a class="btn btn-editor"></a>
                            <form action="{{ route('delete-experience', $experiences->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-remove" type="submit"></button></div>
                            </form>
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
