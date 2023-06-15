@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Detail Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Detail Data Product</h5>
        
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            : {{$data->nama}}
                          </div>
                        </div>   
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                              : {{$data->category->nama}}
                            </div>
                          </div>  
                      
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                          <div class="col-sm-10">
                            : @currency($data->harga)
                          </div>
                        </div>   
                        <img class="img-preview"style="width:200px">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                : <img style="width: 150px;" src="{{ asset('storage/'. $data->gambar) }}" alt="">
                            </div>
                          </div> 
                          <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                : {{$data->deskripsi}}
                            </div>
                          </div>                                     
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/product')}}" class="btn btn-info text-white">Kembali</a>
                           
                          </div>
                        </div>
        
        
                    </div>
                  </div>
        
        
            </div>
        </div>
    </div>
  </section>
@endsection