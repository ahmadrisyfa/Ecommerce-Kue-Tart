@extends('template.website.dashboard')
@section('content_website')
<div class="header_custom-bg">
    <div class="header_custom-text">
        <h1>Terima Kasih</h1>
        <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Terima Kasih</h6>
    </div>
</div>

<div class="container" style="margin-top:50px;margin-bottom:50px">
    <div class="card card-body">

    <div class="text-center">
        <h2>Terima Kasih!</h2>
        <p>Pesanan Anda telah berhasil diproses.</p>          
        <p>Informasi lebih lanjut akan Segera Di Konfirmasi Oleh Penjual</p>
        <a href="{{url('/')}}" class="btn btn-success">Kembali ke Beranda</a>
      </div>
      

    </div>
</div>
@endsection