@extends('template.website.dashboard')
@section('content_website')
    
<div class="header_custom-bg">
    <div class="header_custom-text">
        <h1>Keranjang</h1>
        <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Keranjang</h6>
    </div>
</div>
<div class="container" style="margin-top:50px;margin-bottom:50px">
   
    @if(session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
                {{ session('berhasil') }}
    </div>
    @endif 
    <ul class="list-group">
        <li class="list-group-item">
            <div class="row">
                  <div class="col-md-2 font-weight-bold">
                    <p>Gambar</p>
                  </div>
                  <div class="col-md-2 font-weight-bold">
                      <p>Nama Produk</p>
                  </div>            
                  <div class="col-md-2 font-weight-bold">
                      <p>Harga</p>
                  </div>
                  <div class="col-md-2 font-weight-bold">
                      <p>jumlah Beli</p>
                  </div>
                  <div class="col-md-2 font-weight-bold">
                      <p>Total</p>
                  </div>
                  <div class="col-md-2 font-weight-bold">
                      <span>Action</span>
                  </div>
                  
            </div>
          </li>


        <li class="list-group-item">
            @php
            $total = 0;
        @endphp
        
        @foreach ($data as $value)    
            <li class="list-group-item">
                <div class="row pb-2">
                    <div class="col-md-2">
                        <img src="{{ asset('storage/'.$value->product->gambar) }}" alt="Gambar Produk" class="img-fluid">
                    </div>
                    <div class="col-md-2">
                        <a style="color:black"> {{ $value->product->nama }}</a>
                        @if ($value->size)
                            <p>*Size:&nbsp;&nbsp; {{$value->size->nama}}</p>                            
                        @endif
                       
                    </div>
                    <div class="col-md-2">
                        <p>@currency($value->product->harga)</p>
                        {{-- <p>*Harga Size {{$value->size->nama}} Menjadi <b>@currency($value->harga_dan_size)</b></p> --}}
                    </div>
                    <div class="col-md-2">
                        <p>{{ $value->quantity }}</p>
                        @if ($value->toppings)
                        <p>*Toppings:&nbsp;&nbsp;{{$value->toppings}}</p>                            
                        @endif
                    </div>
                    <div class="col-md-2">
                        @currency($value->harga_dan_size * $value->quantity)
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('cart/'.$value->id.'/hapus') }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" style="font-weight:bold" class="btn btn-danger"><i class="bi bi-trash" style="margin-right:10px"></i>Hapus</a>
                    </div>
                    
                </div>
                @php
                    $harga = $value->harga_dan_size;
                    $jumlah = $value->quantity;
                    $subtotal = $harga * $jumlah;                                                                           
                    $total += $subtotal;
                @endphp
            </li>
        @endforeach
        
          
        
        </li>
  
    </ul>
  
      <div class="card mt-3 mb-3" style="float:right;width:400px">
        <div class="card-body" >
          <h5 class="card-title">Ringkasan Keranjang</h5>
          <p>Total Item: {{$hitungdata}}</p>
          
          <p>Total Semua: @currency($total)</p>
         
          <a href="{{url('checkout')}}" class="btn btn-success">Checkout</a>
        </div>
      </div>
@endsection