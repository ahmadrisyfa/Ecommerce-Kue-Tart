@extends('template.website.dashboard')
@section('content_website')
<div class="header_custom-bg">
    <div class="header_custom-text">
        <h1>Riwayat Transaksi Detail</h1>
        <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Riwayat Transaksi Detail</h6>
    </div>
</div>

<div class="container" style="margin-top:50px;margin-bottom:50px">
    <div class="card card-body">

        @foreach ($data as $value)
        <div class="row mb-3">
                
            <div class="col-md-2">
                <img style="width: 150px;" src="{{ asset('storage/'. $value->product->gambar) }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-10">
                <p>Nama: {{$value->product->nama}}</p>
                <p>Size: {{$value->size->nama}}</p>
                <p>Jumlah: {{$value->quantity}}</p>
                @if ($value->toppings)
                <p>Toppings: {{$value->toppings}}</p>
                @endif             
            </div>
          </div>        
          @endforeach
          <div class="col-md-12 text-center">
            <h4>Total Yang Di Transfer: @currency($value->total)</h4>
            @if($value->proses == 0)
            <h4>Proses: <span class="btn btn-primary mb-3 text-white">Menunggu konfirmasi</span></h4>
            @else
            <h4>Proses: <span class="btn btn-info mb-3 text-white">Sudah Di konfirmasi</span></h4>
            @endif
          </div>
          <div class="col-sm-6">
            <a href="{{url('riwayat-transaksi')}}" class="btn btn-primary">Kembali</a>
          </div>
        </div>
</div>
@endsection