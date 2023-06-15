@extends('template.website.dashboard')
@section('content_website')
<div class="header_custom-bg">
    <div class="header_custom-text">
        <h1>Riwayat Transaksi</h1>
        <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Riwayat Transaksi</h6>
    </div>
</div>

<div class="container" style="margin-top:50px;margin-bottom:50px">
    <div class="card card-body">

        <h3 class="mt-1">Riwayat Transaksi</h3>
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Foto Transfer</th>
              <th scope="col">Proses</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $value)
                
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$value->created_at}}</td>
                <td><img style="width: 50px;" src="{{ asset('storage/'. $value->foto_transaksi) }}" alt=""></td>
                    @if ($value->proses == 0)                                              
                    <td><span class="btn btn-primary mb-3 text-white">Menunggu konfirmasi</span></td>
                    @else
                     <td><span class="btn btn-info mb-3 text-white">Sudah Di Konfirmasi</span></td>                                       
                    @endif                             
                  
                <td>@currency($value->total)</td>
                <td>
                    <a href="{{url('riwayat-transaksi/'.$value->created_at)}}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
           
          </tbody>
        </table>

    </div>
</div>
@endsection