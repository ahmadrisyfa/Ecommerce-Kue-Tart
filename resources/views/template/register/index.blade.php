@extends('template.website.dashboard')
@section('css_website')
    <style>    
    .container1 {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-primary {
      width: 100%;
    }
    </style>
@endsection
@section('content_website')
<div class="header_custom-bg">
  <div class="header_custom-text">
    <h1>Register</h1>
    <h6> <a href="{{url('/')}}" style="color: black">Home</a> \ Register</h6>
</div>
</div>
<div class="container">
<div class="container1">
    <h2>Form Register</h2>
    <form action="{{url('register')}}" method="post">
        @csrf
      <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" required id="name" placeholder="Masukkan nama">
        @error('name')
        <div class="invalid-feedback">
          {{ $message }}
        </div>  
        @enderror
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control @error('email')is-invalid @enderror" name="email" required id="email" placeholder="Masukkan email">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>  
        @enderror
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" required id="password" placeholder="Masukkan password">
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>  
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Daftar</button>
      <a href="{{url('/login')}}">Sudah Punya Akun?</a>
    </form>
  </div>
</div>
  @endsection