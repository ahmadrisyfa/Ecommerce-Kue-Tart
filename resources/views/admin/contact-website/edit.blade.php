@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Edit Contact Website</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Contact Website</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Edit Data Contact Website</h5>
        
                      <form method="POST" action="{{ url('admin/contact-website/'.$data->id.'/edit') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input name="email" value="{{$data->email}}" type="email" class="form-control">
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">No Telepon 1</label>
                          <div class="col-sm-10">
                            <input required name="no_telp1" value="{{$data->no_telp1}}" type="text" class="form-control">
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">No Telepon 2</label>
                          <div class="col-sm-10">
                            <input name="no_telp2" type="text"value="{{$data->no_telp2}}"class="form-control">
                          </div>
                        </div>                        
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
                          <div class="col-sm-10">
                            <textarea required name="alamat" type="text" class="form-control">{{$data->alamat}}</textarea>
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