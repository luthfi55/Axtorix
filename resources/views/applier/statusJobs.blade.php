@extends('layouts.app')

@section('title', 'Status Lamaran')

@section('content')    
<style>
  .my-custom-pagination .page-link {
    color: #4477CE;
}

.my-custom-pagination .page-link:hover {
    color: #4477CE; /* You might want a different color for hover state */
}

.my-custom-pagination .page-item.active .page-link {
    background-color: #4477CE;
    border-color: #4477CE;
    color: white; /* Text color for active page number */
  }
  .btn-apply-now {
    background-color: #4477CE;
    border-color: #4477CE;
    color: white; /* Text color for active page number */
  }
  .btn-apply-now:hover {
    background-color: #4477CE;
    border-color: #4477CE;
    color: white; /* Text color for active page number */
  }

</style>
<section class="section-box mt-30">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="content-page"> 
          <div class="box-filters-job">
            <div class="row">                  
              <div class="col-lg-6">
                <span class="text-small text-showing">Menampilkan <strong>{{ ($apply->currentPage() - 1) * $apply->perPage() + 1 }}-{{ min($apply->currentPage() * $apply->perPage(), $apply->total()) }}</strong> dari <strong>{{ $apply->total() }}</strong> lamaran</span>
              </div>                    
            </div>
          </div>
          @foreach($apply as $applys)          
          <div class="row display-list mb-3">            
            <div class="col-md-8">
              <div class="border p-3">
                <div class="card-grid-2-image-left d-flex align-items-center">
                  <div class="image-box mr-3"><img width="50px" src="{{ Storage::url($applys->job->recruiter->picture) }}" alt="jobBox"></div>
                  
                  <div class="right-info">
                    <a class="name-job" href="#">{{$applys->job->recruiter->name}}</a>                    
                  </div>
                </div>
                <div class="card-block-info mt-3">
                  <h4><a href="job-details.html">{{$applys->job->name}}</a></h4>
                  <div>
                    <span class="card-location mr-10">{{$applys->job->recruiter->city}}</span>
                    <span class="card-time"><span>4</span> mins ago</span>                    
                  </div>
                  <h6 class="mt-2">Deskripsi:</h6>
                  <p class="font-sm">{{$applys->job->description}}</p>
                  @if($applys->job->required_vidio)
                  <h6 class="mt-2">Deskripsi Video:</h6>
                  <p class="font-sm">{{$applys->job->required_vidio}}</p>
                  @endif
                  <h6 class="mt-2">Tanggal Lamaran:</h6>                  
                  <?php
                  $monthNames = [
                      'January' => 'Januari',
                      'February' => 'Februari',
                      'March' => 'Maret',
                      'April' => 'April',
                      'May' => 'Mei',
                      'June' => 'Juni',
                      'July' => 'Juli',
                      'August' => 'Agustus',
                      'September' => 'September',
                      'October' => 'Oktober',
                      'November' => 'November',
                      'December' => 'Desember'
                  ];

                  $originalDate = strtotime($applys->created_at);
                  $day = date('d', $originalDate);
                  $year = date('Y', $originalDate);
                  $month = $monthNames[date('F', $originalDate)];
                  ?>

                  <p class="font-sm"><?= $day . ' ' . $month . ' ' . $year ?></p>

                </div>
              </div>
            </div>            
            <div class="col-md-4">
              <div class="border p-3 h-100 d-flex flex-column justify-content-between">
              <div>        
                <h5 class="mb-5">Lamaran yang anda kirim</h5>
                <p>Email: <span style="text-decoration:underline;">{{$applys->email}}</span></p>                
                <p>Nomor telpon: <span style="text-decoration:underline;">{{$applys->phone_number}}</span></p>                
                <p>CV: <a style="text-decoration:underline;" href="{{ Storage::url($applys->resume) }}" target="_blank">Lihat</a></p>
                @if ($applys->link_vidio != null)
                    <p>Link Vidio: <a href="{{$applys->link_vidio}}" target="_blank">{{$applys->link_vidio}}</a></p>                
                @endif
                <!-- @if ($applys->status == "accept")
                    <p>Status lamaran: <span style="color:green;">{{$status = "Diterima"}}</span></p>
                @elseif ($applys->status == "reject")
                    <p>Status lamaran: <span style="color:red;">{{$status = "Ditolak"}}</span></p>
                @else
                    <p>Status lamaran: <span style="color:blue;">{{$status = "Menunggu"}}</span></p>
                @endif                             -->
                </div>

                <div>
                  <div class="btn btn-apply-now" data-bs-toggle="modal" data-bs-target="#ModalStatus{{ $applys->status }}">Cek Status</div>
                  <div class="modal fade" id="ModalStatus{{ $applys->status }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content apply-job-form">
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="modal-body pl-30 pr-30 pt-50">
                            <div class="text-center">
                            <!-- <p class="font-sm text-brand-2">Job Application </p> -->
                            <h2 class="mt-10 mb-30 text-brand-1 text-capitalize">Status Lamaran Anda</h2>                            
                            </div>                            
                            <div class="form-group">
                                <!-- <label class="form-label" for="input-1">{{$applys->status}}</label> -->
                                @if ($applys->status == "accept")
                                    <h4 class="mb-10">Status lamaran: </h4>
                                    <h4 class="mb-10" style="color:green;">{{$status = "Diterima"}}</h4>
                                    <div class="alert alert-success">
                                        Selamat, <br>lamaran Anda telah berhasil! Recruiter akan segera menghubungi Anda untuk langkah selanjutnya. Harap perhatikan kontak Anda dan siapkan diri Anda untuk kesempatan baru ini!
                                        <br><br>
                                        Hubungi kontak berikut jika tidak mendapatkan kabar lebih dari 3 hari.
                                        <br>
                                        Kontak: {{$applys->job->recruiter->phone_number}}
                                    </div>
                                @elseif ($applys->status == "reject")
                                    <h4 class="mb-10">Status lamaran: </h4>
                                    <h4 class="mb-10" style="color:red;">{{$status = "Ditolak"}}</h4 >
                                    <div class="alert alert-light">
                                        "Setiap penolakan adalah langkah lebih dekat menuju kesuksesan yang menanti. Tetap semangat dan teruslah bergerak maju. Kesempatan berikutnya mungkin adalah momen Anda untuk bersinar!"
                                    </div>
                                @else
                                    <h4 class="mb-10">Status lamaran: </h4>
                                    <h4 class="mb-20" style="color:blue;">{{$status = "Menunggu"}}</h4>
                                    <div class="alert alert-info">
                                    Lamaran Anda sedang dalam tahap seleksi. Kami akan segera menginformasikan perkembangannya. Terima kasih atas kesabaran Anda!
                                    </div>
                                @endif                            
                                <!-- <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job"> -->
                            </div>
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="paginations my-custom-pagination">
            {{ $apply->links('vendor.pagination.bootstrap-4') }}
        </div>


      </div>            
    </div>
  </div>
</section>            
@endsection
