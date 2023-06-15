@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Edit Slider</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Slider</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Edit Data Slider</h5>
        
                      <form method="POST" action="{{ url('admin/slider/'.$data->id.'/edit') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">judul</label>
                          <div class="col-sm-10">
                            <input  required name="judul" value="{{$data->judul}}" type="text" class="form-control">
                          </div>
                        </div>     
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                          <div class="col-sm-10">
                            <input  required name="deskripsi" value="{{$data->deskripsi}}" type="text" class="form-control">
                          </div>
                        </div>     
                        <input type="hidden" class="mb-3 mt-3" name="oldImage" value="{{ old('gambar', $data->gambar)}}">
                        <img src="{{ asset('storage/'. $data->gambar) }}" class="img-preview mb-3 mt-3" style="width: 200px">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                              <input  name="gambar" type="file" onchange="previewImage()" id="gambar" class="form-control">
                            </div>
                        </div>                                                                  
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/slider')}}" class="btn btn-info text-white">Kembali</a>
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