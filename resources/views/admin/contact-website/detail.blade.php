@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Detail Contact Website</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Contact Website</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Detail Data Contact Website</h5>
                        @if ($data->email == null)
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            : <b>Data Email Tidak Di Isi</b>
                          </div>
                        </div>  
                        @else
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            : {{$data->email}}
                          </div>
                        </div>     
                        @endif
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">No Telepon 1</label>
                          <div class="col-sm-10">
                            : {{$data->no_telp1}}
                          </div>
                        </div>   
                        @if ($data->no_telp2 == null)
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            : <b>Data No Telepon 2 Tidak Di Isi</b>
                          </div>
                        </div>  
                        @else
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">No Telepon 2</label>
                          <div class="col-sm-10">
                            : {{$data->no_telp2}}
                          </div>
                        </div>                                                     
                        @endif 
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            : {{$data->alamat}}
                          </div>
                        </div>   
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/contact-website')}}" class="btn btn-info text-white">Kembali</a>
                           
                          </div>
                        </div>
        
        
                    </div>
                  </div>
        
        
            </div>
        </div>
    </div>
  </section>
@endsection