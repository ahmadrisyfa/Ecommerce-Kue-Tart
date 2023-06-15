@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Daftar Transaksi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Transaksi</li>
      </ol>
    </nav>
  </div>
  @if(session()->has('berhasil'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="bi bi-check-circle me-1"></i>
                  {{ session('berhasil') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif 
  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="card">
              
              <form action="{{url('admin/transaksi/search')}}" method="post">
                @csrf
                <div style="margin-top:10px">
                    Dari Tanggal <input id="fromDate" name="fromDate" value="{{ request('fromDate') }}"
                        class="date-picker form-control" type="date" required>
                </div>
                <div >
                    Sampai Tanggal
                    <input id="toDate" name="toDate" value="{{ request('toDate') }}" class="date-picker form-control"
                        type="date" required>
                </div>
                <div class="col-sm-12" style="margin-top: 18px;">
    
                    <button class="btn btn-info" style="margin-left:35%"type="submit">Cari Berdasarkan Tanggal</button>
                    <a href="{{url('admin/cetak/transaksi')}}" style="font-weight:bold" class="btn btn-primary"><i class="bi bi-printer-fill" style="margin-right:10px"></i>Cetak</a>

                </div>
            </form>
              <div class="card-body">        
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Total</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Proses</th>
                            <th scope="col" >Action</th>
                          </tr>
                        </thead>
                        <tbody>                        
                          @foreach ($data as $value)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$value->user->name}}</td>
                            <td>@currency($value->total)</td>
                            <td>{{$value->created_at}}</td>
                            @if ($value->proses == 0)
                            <td>Menunggu konfirmasi</td>
                            @else
                            <td>Sudah Di Konfirmasi</td>
                                
                            @endif
                            <td>
                              <a href="{{ url('admin/detail/'.$value->created_at.'/transaksi') }}" style="font-weight:bold" class="btn btn-info"><i class="bi bi-eye-fill" style="margin-right:10px"></i>Detail</a>                              
                            </td>
                            <td>
                              <a href="{{ url('admin/konfirmasi-proses/'.$value->created_at.'/transaksi') }}" style="font-weight:bold" class="btn btn-primary"><i class="bi bi-brush-fill" style="margin-right:10px"></i>Konfirmasi Proses</a>
                            </td>
                           
                          </tr>
                          @endforeach
                        
                        </tbody>
                      </table>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
  </section>
@endsection