@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Daftar Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
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
                   <div class="card-body pt-4 pb-4">
                <div class="col-sm-12">
                    <a href="{{url('admin/transaksi/cetak-semua-data')}}" style="width:100%;color:black" class="btn btn-info" target="_blank"><i class="bi bi-printer-fill" style="margin-right:10px"></i>Cetak Semua Data</a>
                </div>
                   </div>
                </div>

                <div class="card">
                    <div class="card-body pt-4 pb-4">
                 <div class="col-sm-12">
                    <form action="{{url('admin/transaksi/cetak-data-pertanggal')}}" method="post" target="_blank">
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
                        <button type="submit" style="color:black;width:100%" class="btn btn-primary mt-3" target="_blank"><i class="bi bi-printer-fill" style="margin-right:10px"></i>Cetak Data Per Tanggal</button>
                    </form>
                 </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a href="{{url('admin/transaksi')}}" class="btn btn-info" style="color:white">Ke Detail Transaksi</a>
                </div>
        </div>
    </div>
  </section>
@endsection