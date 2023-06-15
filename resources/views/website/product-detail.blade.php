@extends('template.website.dashboard')
@section('css_website')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content_website')
<div class="header_custom-bg">
    <div class="header_custom-text">
      <h1>Detail Product</h1>
      <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Detail Product</h6>
  </div>
</div>
<div class="container" style="margin-top:50px;margin-bottom:50px">
  @if(session()->has('berhasil'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
              {{ session('berhasil') }}
  </div>
@endif 
    <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('storage/'.$data->gambar) }}" alt="Gambar Produk" class="img-fluid">
        </div>
        <div class="col-md-6" style="text-transform:capitalize;">
          <h2>{{$data->nama}}</h2>
          <p>{{$data->deskripsi}}</p>
          <h6>Category: {{$data->category->nama}}</h6>
          <h4>@currency($data->harga)</h4>
          <form action="{{url('product/cart')}}" method="POST">
            @csrf    
          <div class="form-group">
             <label for="size">Ukuran:</label>
          <select id="size" name="size_id"  class="form-control" required>
            @foreach($sizes as $size)
            <option  value="{{ $size->id }}">{{ $size->nama }}</option>
            @endforeach
          </select>
        </div>
          {{-- <p id="harga"></p> --}}
          <label for="total">Total Harga Kue:</label>               
          <h4>Rp.<input type="number" id="total" name="harga_dan_size" value="0" readonly style="border:1px solid white"></h4>
          
      
          <input type="hidden"  id="cek" name="cek" value="{{$data->harga}}">
            
          @if ($data->category->nama == 'Fruit')          
          <div class="form-group">
            <label for="topping">Topping:</label>
            <select class="form-control"  name="toppings" required id="topping">
              <option disabled selected>Silahkan pilih Topping</option>        
              <option value="Strawberry + Orange">Strawberry + Orange</option>        
              <option value="Kiwi + Orange ">Kiwi + Orange </option>        
              <option value="Strawberry + Kiwi">Strawberry + Kiwi</option>                      
            </select>
          </div>
          @elseif ($data->category->nama == 'Tart Buah')
          <div class="form-group">
            <label for="topping">Topping:</label>
            <select class="form-control"  name="toppings" id="topping">
              <option disabled selected>Silahkan pilih Topping</option>        
              <option value="Strawberry + Orange">Strawberry + Orange</option>        
              <option value="Kiwi + Orange">Kiwi + Orange</option>        
              <option value="Strawberry + Kiwi">Strawberry + Kiwi</option>        
              
            </select>
          </div>
          @endif

            <div class="form-group">
              <label for="quantity">Jumlah Beli:</label>
              <input type="number" name="quantity" required class="form-control" id="quantity" value="1">
            </div>
            <input type="text"style="opacity:0" name="product_id" value="{{$data->id}}">

            @auth
            <button  type="submit" class="btn btn-primary" style="background-color: #BC8246;border:1px solid #BC8246"><i class="bi bi-plus"></i> Tambahkan ke Keranjang</button>
            @else
            <span class="btn btn-primary" style="background-color: #BC8246;border:1px solid #BC8246"> SIlahkan Login Untuk Menambah Ke Keranjang</span>              
            @endauth
    </form>
        </div>
    </div>
      <div class="container  mt-5">

          <h5 class="text-center">Related Products</h5>
          <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam animi consequatur voluptatum optio fugiat pariatur dolorem iusto iste minima ab vero consectetur praesentium maxime ex, quidem qui. Laudantium, impedit eveniet.</p>
      <div class="row">
        @foreach ($productRandom as $value)
        <div class="col-sm-3">
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

</div>
<script>
  $(document).ready(function() {
      $('#size').on('change', function() {
          var size = $(this).val();

          // Kirim permintaan AJAX ke server Laravel
          $.ajax({
              url: '/get-harga/' + size,
              type: 'GET',
              success: function(response) {
                  var harga = response.harga;
                  $('#harga').text('Harga Ukuran Kue: ' + harga);

                  var total = parseInt(harga) + parseInt($('#cek').val());
                  $('#total').val(total);
              }
          });
      });

      $('#cek').on('input', function() {
          var harga = parseInt($('#harga').text().split(':')[1]);
          var total = harga + parseInt($(this).val());
          $('#total').val(total);
      });

      // Pemanggilan awal saat halaman dimuat
      $('#size').trigger('change');
  });
</script>


@endsection