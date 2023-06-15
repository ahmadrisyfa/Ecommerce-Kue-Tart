@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Create Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Isi Data Category</h5>
        
                      <form action="{{url('admin/category/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input  required name="nama" type="text" class="form-control">
                          </div>
                        </div>     
                        <img class="img-preview mb-3 mt-3"style="width:200px">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                              <input  required name="gambar" type="file" onchange="previewImage()" id="gambar" class="form-control">
                            </div>
                        </div>                                                                 
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/category')}}" class="btn btn-info text-white">Kembali</a>
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