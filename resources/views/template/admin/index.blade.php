@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>

<section class="section dashboard">
  <div class="row">
    <div class="col-lg-12">
        <div class="row">
          @if(session()->has('berhasil'))
          <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              <i class="bi bi-check-circle me-1"></i>
                      {{ session('berhasil') }}
          </div>
          @endif 
  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Total Semua Product</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-palette2"></i>
          </div>
          <div class="ps-3">
            <h6>{{$totalProduct}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Total Semua Category</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-journal-text"></i>
          </div>
          <div class="ps-3">
            <h6>{{$totalCategory}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Total Semua User</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-people-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{$totaluser}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xxl-4 col-md-6">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Total Semua Admin</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-person-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{$totaladmin}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xxl-4 col-md-12">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Total Semua Produk Yang telah Di Jual</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-archive-fill"></i>
          </div>
          <div class="ps-3">
            <h6>{{$totalterjual}}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
    </div>
  </div>
</section>
@endsection