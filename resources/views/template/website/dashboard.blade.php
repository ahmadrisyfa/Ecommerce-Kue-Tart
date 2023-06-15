<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Kue Tart</title>
    <link rel="shortcut icon" href="{{asset('website')}}/img/logo.png" type="image/x-icon">
    <style>
        body {
            font-family: 'Inter', ;
        }

        .navbar {
            background-color: white;
            /* Change background color to white */
        }

        .navbar-light .navbar-nav .nav-link {
            color: #151E28;
            font-weight: 500;
            /* Change text color to black */
        }

        .navbar-brand {
            margin-right: auto;
        }

        .navbar-nav {
            flex-direction: row;
        }

        .nav-item {
            padding: 0 10px;
        }

        .pesan-sekarang-link {
            background: #ab6a3e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
        }

        .carousel-item {
            text-align: center;
            min-height: 280px;
        }

        .carousel-item img {
            width: 100%;
            max-height: 500px;
            /* overflow: hidden; */
            margin: auto;
        }

        .carousel-control-prev,
        .carousel-control-next {
            transform: translateY(-50%);
            top: 50%;
            width: 40px;
            height: 40px;
            background-color: rgba(247, 247, 247, 0.94);
            border-radius: 50%;
        }



        .carousel-control-prev {
            left: 5px;
        }

        .carousel-control-next {
            right: 5px;
        }

        .carousel-caption {
            text-align: left;
            top: 80px;
            left: 210px;
            right: auto;
            padding-left: 20px;
            padding-right: 0;
        }

        .centered-cards {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card-img {
            width: 150px;
            height: auto;
            margin-right: 25px;
            float: left;
        }

        .star-icon {
            color: gold;
            font-size: 13px;
        }

        .question {
            cursor: pointer;
            padding-top: 10px;
            font-size: 15px;
            /* font-weight: bold; */
            color: #ab6a3e;
        }

        .answer {
            padding-top: 5px;
            display: none;
            padding-bottom: 15px;

        }

        .contact-hubungi-kami {
            text-align: center;
            padding: 20px;
        }

        .icon-hubungi-kami {
            font-size: 40px;
            color: #ab6a3e;
        }

        .footer {
            padding: 20px;
            color: #ADB5BD;
        }

        .footer hr {
            background-color: #ADB5BD;
            margin-top: 10px;
            margin-bottom: 10px;

        }

        .footer-logo {
            width: 50px;
            display: inline-block;
            vertical-align: middle;
        }
        .header_custom-bg {
      background-image: url("{{asset('website/img/background.jpg')}}");
      background-position: center;
      background-size: cover;
      height: 400px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .header_custom-text {
      color: black;
      /* font-size: 24px; */
      text-align: center;
    }
    </style>
    @yield('css_website')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            @if ($nameWebsite = \App\Models\NameWebsite::first())  
            @php
            $nameWebsite = \App\Models\NameWebsite::first()->get();
            @endphp
            @foreach ($nameWebsite as $value)
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('storage/'. $value->gambar) }}" width="50px" alt=""></a>
            @endforeach
            @else
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('website')}}/img/logo.png" width="50px" alt=""></a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item dropdown"> <!-- Dropdown untuk Kategori -->
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKategori" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownKategori">
                            @if ($category = \App\Models\Category::first())  
                            @php
                            $category = \App\Models\Category::first()->get();
                            @endphp
                            @foreach ($category as $value)
                            <a class="dropdown-item" href="{{url('category/'.$value->id.'/detail')}}">{{$value->nama}}</a>
                          
                            @endforeach                        
                            @else
                            <span class="dropdown-item" href="#"><b>Anda Belum Memiliki kategori</b></span>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tanya Jawab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hubungi Kami</a>
                    </li>
                    <li class="nav-item dropdown"> <!-- Dropdown untuk Akun Saya -->
                        @auth
                        <a class="nav-link dropdown-toggle" style="text-transform: capitalize" href="#" id="navbarDropdownAkun" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{auth()->user()->name}}
                        </a>
                        @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAkun" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Akun Saya
                        </a>
                        @endauth
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownAkun">
                            <!-- Isi dropdown menu Akun Saya -->
                            @auth
                            <a class="dropdown-item" href="#">Profil</a>
                            
                            @if (auth()->user()->admin == 1 )
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('admin/dashboard')}}">Website Admin</a>   
                            
                            <div class="dropdown-divider"></div>
                            @else
                            <div class="dropdown-divider"></div>                            
                            @endif                            
                            <a class="dropdown-item" href="/riwayat-transaksi">Riwayat Transaksi</a>

                            <div class="dropdown-divider"></div>

                            <form action="{{url('logout')}}" method="post">
                              @csrf
                              <button type="submit" class="dropdown-item"> Logout</button>
                            </form>
                           
                          @else
                            <a  href="{{url('/login')}}" class="dropdown-item" href="#">
                              <span>Login</span>
                            </a>
                          @endauth
                        </div>
                    </li>
                    <li class="nav-item">
                        @auth
                        @php
                        $dataCount = \App\Models\Cart::where('user_id', auth()->user()->id)->count();                           
                        @endphp
                        <a class="nav-link" href="{{url('cart')}}"><span style="font-weight: bold;color:#ab6a3e">({{$dataCount}})</span> Keranjang</a>                      
                        @else
                        <a class="nav-link" href="{{url('cart')}}"><span style="font-weight: bold;color:#ab6a3e">(0)</span> Keranjang</a>                                              
                        @endauth
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link pesan-sekarang-link" style="color:white" href="{{url('cart')}}">Pesan Sekarang</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
    

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @yield('content_website')
            </div>
        </div>
    </div>
    @yield('content_website_index')

    <div class="footer-website" style="background-color:#151E28;">
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 pb-3 pt-3">
                        @if ($nameWebsite = \App\Models\NameWebsite::first())  
                        @php
                        $nameWebsite = \App\Models\NameWebsite::first()->get();
                        @endphp
                        @foreach ($nameWebsite as $value)
                        <img src="{{ asset('storage/'. $value->gambar) }}" alt="Logo" class="footer-logo">
                        @endforeach
                        @else
                        <img src="{{asset('website')}}/img/logo.png" alt="Logo" class="footer-logo">
                        @endif
                    </div>
                </div>
                <hr>
            </div>
            <div class="container pt-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <p>Tart Tuns adalah sebuah UMKM yang terletak pada pontianak.</p>
                            </div>
                            <div class="col-md-6">
                                @if ($datafooter = \App\Models\ContactWebsite::first())  
                                @php
                              $datafooter = \App\Models\ContactWebsite::first()->get();
                            @endphp
                            @foreach ($datafooter as $value)
                            <p><i class="bi bi-geo-alt pr-2"></i>{{$value->alamat}}</p>
                            </div>
                            <div class="col-md-6">

                            <p><i class="bi bi-telephone pr-2"></i>{{$value->no_telp1}}</p>
                            @if ($value->no_telp2 == null)
                                
                            @else
                            <p><i class="bi bi-telephone pr-2"></i>{{$value->no_telp2}}</p>
                            @endif
                            </div>
                            @endforeach
                            @else
                                <p><i class="bi bi-geo-alt pr-2"></i>Pontianak, Indonesia</p>
                            </div>
                            <div class="col-md-6">

                                <p><i class="bi bi-telephone pr-2"></i>(+62) 8888 8888</p>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <ul style="list-style:none">
                                    <li><a style="color: #ADB5BD;font-size:12px;" href="#">Home</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;" href="#">Tanya Jawab</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;" href="#">Hubungi Kami</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;" href="#">Produk Rekomendasi</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;" href="#">Masuk</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;" href="#">Daftar</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul style="list-style:none">
                                    <li><a style="color: #ADB5BD;font-size:12px;">Original Tart</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;">Fruit Tart</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;">Hampers</a></li>
                                    <li><a style="color: #ADB5BD;font-size:12px;">Topping</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul style="list-style:none">
                                    <li><a href="#" style="color: #ADB5BD;font-size:12px;"><i
                                                class="bi bi-facebook pr-2"></i>Facebook</a></li>
                                    <li><a href="#" style="color: #ADB5BD;font-size:12px;"><i
                                                class="bi bi-instagram pr-2"></i>Instagram</a></li>
                                    <li><a href="#" style="color: #ADB5BD;font-size:12px;"><i
                                                class="bi bi-twitter pr-2"></i>Twitter</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row justify-content-between d-flex">
                    <div class="col-md-6">
                        @if ($nameWebsite = \App\Models\NameWebsite::first())  
                        @php
                      $nameWebsite = \App\Models\NameWebsite::first()->get();
                        @endphp
                        @foreach ($nameWebsite as $value)
                        <p style="font-size: 12px;">© Copyright 2023 | {{$value->nama}}
                        @endforeach
                        @else
                        <p style="font-size: 12px;">© Copyright 2023 | Tart Tuns
                        @endif
                    </div>
                    <div class="col-md-6 text-right">
                        <p style="font-size: 12px;"><a href="#" style="color: #ADB5BD;">FAQ | Kontak Kami</a></p>
                    </div>
                </div>
            </div>

        </footer>
    </div>
    <script>
        function toggleAnswer(id) {
            var answer = document.getElementById("answer" + id);
            if (answer.style.display === "none") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>  --}}
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</body>

</html>