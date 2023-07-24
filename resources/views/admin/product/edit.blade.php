@extends('template.admin.dashboard')
@section('content')
<div class="pagetitle">
    <h1>Edit Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
       
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Silahkan Edit Data Product</h5>
        
                      <form method="POST" action="{{ url('admin/product/'.$data->id.'/edit') }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                          <div class="col-sm-10">
                            <input  required name="nama" value="{{$data->nama}}" type="text" class="form-control">
                          </div>
                        </div>   
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Category</label>
                          <div class="col-sm-10">
                            <select class="form-select" name="category_id" aria-label="Default select example">
                              <option selected disabled>Silahkan Pilih Category</option>
                              @foreach ($dataCategory as $category)
                              @if(old('category_id',$data->category_id) == $category->id)
                              <option value=" {{ $category->id }}" selected>{{Illuminate\Support\Str::of( $category->nama)->words(15) }} </option>
                              @else
                              <option value=" {{ $category->id }} ">{{Illuminate\Support\Str::of( $category->nama)->words(15) }} </option>
                              @endif
                              @endforeach
                           
                            </select>
                          </div>
                        </div>  
                        <div class="row mb-3">
                          <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                          <div class="col-sm-10">
                            <input  required name="harga" value="{{$data->harga}}" type="number" class="form-control">
                          </div>
                        </div>     
                        <input type="hidden"class="mb-3 mt-3" name="oldImage" value="{{ old('gambar', $data->gambar)}}">
                        <img src="{{ asset('storage/'. $data->gambar) }}" class="img-preview mb-3 mt-3" style="width: 200px">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                              <input  name="gambar" type="file" onchange="previewImage()" id="gambar" class="form-control">
                            </div>
                        </div> 
                          <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="deskripsi" style="height: 100px">{!!$data->deskripsi!!}</textarea>
                            </div>
                          </div>                                                                                                   
                        <div class="row mb-3">                        
                          <div class="col-sm-10">
                            <a href="{{url('admin/product')}}" class="btn btn-info text-white">Kembali</a>
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