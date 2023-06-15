@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Edit Admin Dan User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Admin Dan User</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Edit Data Admin Dan User</h5>
        
                      <form method="POST" action="{{ url('admin/admin-user/'.$data->id.'/edit') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input  required disabled name="" value="{{$data->name}}" type="text" class="form-control">
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input  required disabled name="" value="{{$data->email}}" type="text" class="form-control">
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Peran</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="admin" aria-label="Default select example">
                              <option value="1"  @if ($data->admin == 1) selected @endif>Admin</option>                                                        
                              <option value="0" @if ($data->admin == 0) selected @endif>User</option>                                                        

                            </select>
                          </div>
                        </div>                                                                                                                                              
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/admin-user')}}" class="btn btn-info text-white">Kembali</a>
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
  <script>
    function previewImage() {
    
    const gambar = document.querySelector('#gambar');
    const imgpreview = document.querySelector('.img-preview');

    imgpreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function(oFREvent){
      imgpreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection