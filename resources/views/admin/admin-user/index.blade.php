@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Daftar Admin Dan User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Admin Dan User</li>
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
        
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Peran</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>                        
                          @foreach ($data as $value)
                          <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$value->name}}</td>
                            @if ($value->admin == 1)
                             <td> <span class="btn btn-info">Admin</span></td>
                            @else
                           <td> <span class="btn btn-primary">User</span></td>
                            @endif
                            <td>{{$value->email}}</td>                           
                            <td>
                              <a href="{{ url('admin/admin-user/'.$value->id.'/edit') }}" style="font-weight:bold" class="btn btn-info"><i class="bi bi-pencil-fill" style="margin-right:10px"></i>Edit</a>
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