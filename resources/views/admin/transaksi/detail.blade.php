@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Detail Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Transaksi</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Detail Data Transaksi</h5>
                      
                      @foreach ($data as $value)
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">{{$loop->iteration}}.&nbsp;Nama Product</label>
                        <div class="col-sm-10">
                          : {{$value->product->nama}}
                        </div>
                      </div>   
                      {{-- <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                          : {{$value->product->harga}}
                        </div>
                      </div>   --}}
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                          : {{$value->quantity}}
                        </div>
                      </div>  
                      {{-- @if ($value->size) --}}
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-10">
                          : {{$value->size->nama}}
                        </div>
                      </div>                          
                      {{-- @endif --}}
                      @if ($value->toppings)
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Toppings</label>
                        <div class="col-sm-10">
                          : {{$value->toppings}}
                        </div>
                      </div>                          
                      @endif

                      @endforeach
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Jumlah Yang Perlu Untuk Di Transfer</label>
                        <div class="col-sm-2">
                          : <b> @currency($value->total)</b>
                        </div>
                      </div> 
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Proses</label>
                        <div class="col-sm-6">
                          @if ($value->proses == 0)                                              
                          : <span class="btn btn-primary mb-3 text-white">Menunggu konfirmasi</span>
                          @else
                          : <span class="btn btn-info mb-3 text-white">Sudah konfirmasi</span>
                          @endif            
                        </div>    
                      </div>             

                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Foto Transaksi</label>
                            <div class="col-sm-10">
                                : <img style="width: 150px;" src="{{ asset('storage/'. $value->foto_transaksi) }}" alt="">
                            </div>
                          </div>                      
                        </div>
                      </div> 
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/transaksi')}}" class="btn btn-info text-white">Kembali</a>
                           
                          </div>
                        </div>
        
        
                    </div>
                  </div>
        
        
            </div>
        </div>
    </div>
  </section>
@endsection