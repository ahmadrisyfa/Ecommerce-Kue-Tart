@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Create Contact website</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Contact website</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Isi Data Contact website</h5>
        
                      <form action="{{url('admin/contact-website/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input name="email" type="email" class="form-control">
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">No Telepon 1</label>
                          <div class="col-sm-10">
                            <input required name="no_telp1" type="text" class="form-control">
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">No Telepon 2</label>
                          <div class="col-sm-10">
                            <input name="no_telp2" type="text" class="form-control">
                          </div>
                        </div>                        
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <textarea required name="alamat" type="text" class="form-control"></textarea>
                          </div>
                        </div>                                                              
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/contact-website')}}" class="btn btn-info text-white">Kembali</a>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </div>
        
                      </form>
        
                    </div>
                  </div>
        
        
            </div>
        </div>
    </div>
  </section>
@endsection