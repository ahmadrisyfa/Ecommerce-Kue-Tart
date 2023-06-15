@extends('template.website.dashboard')
@section('content_website')
<div class="header_custom-bg">
    <div class="header_custom-text">
      <h1>Category</h1>
      <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Category</h6>
  </div>
</div>
<div class="container" style="margin-top:50px;margin-bottom:50px">
    <div class="row">
        @foreach ($data as $value)
        <div class="col-sm-3" style="margin-bottom: 20px">
          <div class="card p-2">
            <img src="{{ asset('storage/'.$value->gambar) }}" class="card-img-top" alt="Gambar Produk 1">
            <div class="card-body">
                <a href="{{url('product/'.$value->id.'/detail')}}" style="color:black">
              <h5 class="card-title">{{$value->nama}}</h5>
            </a>
              <p class="card-text">@currency($value->harga)</p>
              {{-- <a href="#" class="btn btn-primary">Beli Sekarang</a> --}}
            </div>
          </div>
        </div>

        @endforeach
       
    </div>
      
      
</div>
@endsection