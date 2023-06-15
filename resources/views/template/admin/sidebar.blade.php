<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/category/create')}}">
              <i class="bi bi-circle"></i><span>Create Category</span>
            </a>
          </li>        
          <li>
            <a href="{{url('admin/category')}}">
              <i class="bi bi-circle"></i><span>Detail Category</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-palette2"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/product/create')}}">
              <i class="bi bi-circle"></i><span>Create Product</span>
            </a>
          </li>        
          <li>
            <a href="{{url('admin/product')}}">
              <i class="bi bi-circle"></i><span>Detail Product</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#slider-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-sliders"></i><span>Slider</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="slider-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/slider/create')}}">
              <i class="bi bi-circle"></i><span>Create Slider</span>
            </a>
          </li>        
          <li>
            <a href="{{url('admin/slider')}}">
              <i class="bi bi-circle"></i><span>Detail Slider</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#size-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-voicemail"></i><span>Size</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="size-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav"> 
          <li>
            <a href="{{url('admin/size/create')}}">
              <i class="bi bi-circle"></i><span>Create Size</span>
            </a>
          </li>              
          <li>
            <a href="{{url('admin/size')}}">
              <i class="bi bi-circle"></i><span>Detail Size</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#admin-user-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-fill"></i><span>Kelola Admin Dan User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="admin-user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">               
          <li>
            <a href="{{url('admin/admin-user')}}">
              <i class="bi bi-circle"></i><span>Detail Admin Dan User</span>
            </a>
          </li>
        </ul>
      </li>      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#transaksi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-credit-card-fill"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="transaksi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">               
          <li>
            <a href="{{url('admin/transaksi')}}">
              <i class="bi bi-circle"></i><span>Detail Transaksi</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/cetak/transaksi')}}">
              <i class="bi bi-circle"></i><span>Cetak Transaksi</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-heading">Detail Website</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#DetailWebsite-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear-fill"></i><span>Detail Website</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="DetailWebsite-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/tanya-jawab')}}">
              <i class="bi bi-circle"></i><span>Tanya Jawab</span>
            </a>
          </li>  
          <li>
            <a href="{{url('admin/name-website')}}">
              <i class="bi bi-circle"></i><span>Nama Dan Logo</span>
            </a>
          </li>        
          <li>
            <a href="{{url('admin/contact-website')}}">
              <i class="bi bi-circle"></i><span>Alamat Dan Contact</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </aside>