@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Daftar Tanya Jawab</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Tanya Jawab</li>
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
                    <div class="card-body">
                      <h5 class="card-title"><a href="{{url('admin/tanya-jawab/create')}}" class="btn btn-success">Tambah Data</a></h5>
        
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">soal</th>
                            <th scope="col">Jawaban</th>
                            <th scope="col" colspan="3" style="text-align: center">Action</th>
                          </tr>
                        </thead>
                        <tbody>                        
                          @foreach ($data as $value)
                          <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$value->soal}}</td>
                            <td>{!!$value->jawaban!!}</td>
                            <td>
                              <a href="{{ url('admin/tanya-jawab/'.$value->id.'/edit') }}" style="font-weight:bold" class="btn btn-info"><i class="bi bi-pencil-fill" style="margin-right:10px"></i>Edit</a>
                            </td>
                            <td>
                              <a  href="{{url('admin/tanya-jawab/'.$value->id.'/hapus')}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"  style="font-weight:bold" class="btn btn-danger"><i class="bi bi-trash" style="margin-right:10px"></i>Hapus</a>
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