@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Create Size</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Size</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Isi Data Size</h5>
        
                      <form action="{{url('admin/size/create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Ukuran</label>
                          <div class="col-sm-10">
                            <input  required name="nama" type="text" class="form-control">
                          </div>
                        </div>                           
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                          <div class="col-sm-10">
                            <input  required name="harga" type="number" class="form-control">
                          </div>
                        </div>                                                                                
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/size')}}" class="btn btn-info text-white">Kembali</a>
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