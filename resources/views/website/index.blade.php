@extends('template.website.dashboard')
@section('content_website_index')
<div class="container">

@if(session()->has('berhasil'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    <i class="bi bi-check-circle me-1"></i>
            {{ session('berhasil') }}
</div>
@endif 
</div>

@if ($dataslider)
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Slides -->
    <div class="carousel-inner">
        
        @foreach ($dataslider as $value)
            
        <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
            <img src="{{ asset('storage/'.$value->gambar) }}" alt="Image 1">
            <div class="carousel-caption">
                <b>
                    <h1 style="width:600px">{{$value->judul}}</h1>
                </b>
                <p style="width:600px">{{$value->deskripsi}}</p>
            </div>
        </div>
        @endforeach

    </div>
    <!-- Previous and Next buttons -->
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    
@else
    
@endif

<div class="produk-rekomendasi" style="background-color: #F8F9FA;">
    <div class="container card-container">
        <h1 class="text-center pb-2" style="padding-top: 100px;">Produk Rekomendasi</h1>
        <h6 class="text-center pb-5">Produk rekomendasi yang diminati oleh banyak orang <br> <b>dalam seminggu
                terakhir.</b> </h6>
        <div class="row" style="padding-bottom: 100px;">
            @if ($dataproduct)    
            @foreach ($dataproduct as $value)
                
            {{-- <div class="col-md-4">
                <div class="card mb-3" style="height:390px;overflow:hidden">
                    <div class="card-body">
                        <img src="{{ asset('storage/'.$value->gambar) }}" style="height: 150px;overflow:hidden" alt="Product 1" class="card-img">
                        <h5 class="card-title">
                            <i class="star-icon fas fa-star"></i>
                            <i class="star-icon fas fa-star"></i>
                            <i class="star-icon fas fa-star"></i>
                            <i class="star-icon fas fa-star"></i>
                            <i class="star-icon fas fa-star"></i>
                        </h5>
                        <p class="card-text font-weight-bold">{{$value->nama}}</p>
                    </div>
                    <div class="card-title" style="margin-left:20px">
                        {{ Str::limit(strip_tags($value->deskripsi), 80) }}
                    </div>
                    <div class="card-title" style="margin-left:20px">
                        <a href="{{url('product/'.$value->id.'/detail')}}" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">View<i
                                class="bi bi-arrow-right" style="margin-left: 5px;font-size:20px;"></i> </a>
                    </div>
                </div>
            </div>   --}}
            <div class="col-sm-4" style="height:600px;overflow:hidden">
                <div class="card p-2">
                  <img src="{{ asset('storage/'.$value->gambar) }}" style="height: 300px;overflow:hidden" class="card-img-top" alt="Gambar Produk 1">
                  <div class="card-body">
                      <a href="{{url('product/'.$value->id.'/detail')}}" style="color:black">
                    <h5 class="card-title">{{$value->nama}}</h5>
                  </a>
                    <p class="card-text">{{ Str::limit(strip_tags($value->deskripsi), 80) }}</p>
                    <a href="{{url('product/'.$value->id.'/detail')}}" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">View<i
                        class="bi bi-arrow-right" style="margin-left: 5px;font-size:20px;"></i> </a>
                  </div>
                </div>
              </div>
            @endforeach         
            @else

            @endif

        </div>

    </div>
</div>

<div class="tanya-jawab" style="background-color: #ab6a3e;">
    <div class="container card-container">
        <h2 class="text-center pb-2" style="padding-top: 100px;color: white;">Tanya Jawab</h2>

        <div class="row" style="padding-bottom: 100px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-text font-weight-bold">Pertanyaan yang sering diajukan</h5>
                        <div class="pertanyaan" style="padding-left: 20px;">
                            @foreach ($data_tanya_jawab as $value)
                                
                            <div class="question" onclick="toggleAnswer({{$value->id}})"><i style="margin-right: 5px;"
                                class="bi bi-patch-plus-fill"></i>{{$value->soal}}</div>
                                <div class="answer" id="answer{{$value->id}}">{!!$value->jawaban!!}</div>                                    
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hubungi-kami" style="background-color: #FBFCFC;">
    <div class="container">
        <h2 class="text-center pb-4" style="padding-top: 100px;color:  #151E28;">Hubungi Kami</h2>
        @if ($contactWebsite = \App\Models\ContactWebsite::first())  
        @php
      $contactWebsite = \App\Models\ContactWebsite::first()->get();
    @endphp
     
    @foreach ($contactWebsite as $value)  
    <div class="row" style="padding-bottom: 100px;">
        <div class="col-md-4">
            <div class="card contact-hubungi-kami">
                <i class="bi bi-calendar-range icon-hubungi-kami"></i>
                <h6 class="font-weight-bold">KANTOR KAMI</h6>
                <p style="text-transform:capitalize">{{$value->alamat}}</p>
                <p><a href="https://maps.app.goo.gl/8Yb7GbD8mDHbScFf9?g_st=iw" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Lihat di
                    maps</a></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card contact-hubungi-kami">
                <i class="bi bi-telephone icon-hubungi-kami"></i>
                <h6 class="font-weight-bold">HUBUNGI KAMI DI</h6>
                <b>
                    <p>{{$value->no_telp1}}</p>
                    @if ($value->no_telp2 == null)
                        
                    @else
                    <p>{{$value->no_telp2}}</p>

                    @endif
                </b>
                @if ($value->email == null)
                    
                @else
                <p style="color:#ab6a3e">{{$value->email}}</p>
                @endif
                <p><a href="https://instagram.com/tart_tuns?igshid=MzRlODBiNWFlZA==" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Instagram</a>
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card contact-hubungi-kami">
                <i class="bi bi-people icon-hubungi-kami"></i>
                <h6 class="font-weight-bold">CUSTOMER SERVICE</h6>
                <p>Butuh bantuan kami? <br> Kami dengan senang hati <br> membantu Anda.</p>

                <p><a href="https://wa.me/62895321217600" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Chat via
                        Whatsapp</a></p>
            </div>
        </div>
    </div>
    @endforeach
    @else
        <div class="row" style="padding-bottom: 100px;">
            <div class="col-md-4">
                <div class="card contact-hubungi-kami">
                    <i class="bi bi-calendar-range icon-hubungi-kami"></i>
                    <h6 class="font-weight-bold">KANTOR KAMI</h6>
                    <p>Jl. Jakarta, <br> Jakarta, Indonesia</p>
                    <p><a href="https://maps.app.goo.gl/8Yb7GbD8mDHbScFf9?g_st=iw" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Lihat di
                            maps</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-hubungi-kami">
                    <i class="bi bi-telephone icon-hubungi-kami"></i>
                    <h6 class="font-weight-bold">HUBUNGI KAMI DI</h6>
                    <b>
                        <p>(+62) - 0895-3212-17600</p>
                    </b>
                    <p style="color:#ab6a3e">info@tarttuns.com</p>
                    <p><a href="https://instagram.com/tart_tuns?igshid=MzRlODBiNWFlZA==" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Instagram</a>
                    </p>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card contact-hubungi-kami">
                    <i class="bi bi-people icon-hubungi-kami"></i>
                    <h6 class="font-weight-bold">CUSTOMER SERVICE</h6>
                    <p>Butuh bantuan kami? <br> Kami dengan senang hati <br> membantu Anda.</p>

                    <p><a href="https://wa.me/62895321217600" target="_blank" style="color:#ab6a3e;text-decoration: underline;font-weight: bold;">Chat via
                            Whatsapp</a></p>
                </div>
            </div>
        </div>
    @endif
    </div>


</div>
@endsection