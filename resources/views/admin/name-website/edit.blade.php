@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Edit Nama Dan Logo Website</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Nama Dan Logo Website</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Edit Data Nama Dan Logo Website</h5>
        
                      <form method="POST" action="{{ url('admin/name-website/'.$data->id.'/edit') }}" enctype="multipart/form-data">
                        {{-- <input type="hidden" name="_method" value="PATCH"> --}}
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input  required name="nama" value="{{$data->nama}}" type="text" class="form-control @error('nama')is-invalid @enderror">
                            @error('nama')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>  
                            @enderror
                          </div>
                        </div>  
                        <input type="hidden" name="oldImage" value="{{ old('gambar', $data->gambar)}}">
                        <img src="{{ asset('storage/'. $data->gambar) }}" class="img-preview" style="width: 200px">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                              <input name="gambar" type="file" onchange="previewImage()" id="gambar" class="form-control @error('gambar')is-invalid @enderror">
                              @error('gambar')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>  
                              @enderror
                            </div>
                        </div>                                                                  
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/name-website')}}" class="btn btn-info text-white">Kembali</a>
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