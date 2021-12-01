<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/">PT. Dhiar Lestari Perkasa</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">DLP</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header"></li>
      <li class="nav-item active">
        <a href="/" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="menu-header">Stok</li>
      <li class="nav-item">
        <a href="/purchase" class="nav-link"><i class="fas fa-dollar-sign"></i> <span>Pembelian</span></a>
      </li>
      <li>
        <a href="/sale" class="nav-link"><i class="fas fa-dollar-sign"></i> <span>Penjualan</span></a>
      </li>
      <li>
        <a href="/stock" class="nav-link"><i class="fas fa-dollar-sign"></i> <span>Stok Barang</span></a>
      </li>
      <li class="menu-header">Barang</li>
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Barang</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="/barang">Barang</a></li>
          <li><a class="nav-link" href="/bentuk">Bentuk Barang</a></li>
          <li><a class="nav-link" href="/satuan">Satuan Barang</a></li>
        </ul>
      </li>
      <li class="menu-header">Third Party</li>
      <li class="nav-item">
        <a href="/customer" class="nav-link"><i class="fas fa-address-book"></i> <span>Customer</span></a>
      </li>
      <li class="nav-item">
        <a href="/supplier" class="nav-link"><i class="fas fa-address-book"></i> <span>Supplier</span></a>
      </li>
      <li class="menu-header">Manajemen Akun</li>
      <li class="nav-item">
        <a href="/user" class="nav-link"><i class="fas fa-users"></i> <span>Akun</span></a>
      </li>
      <li class="menu-header">Logout</li>
      <li class="nav-item">
        <form id="logout" action="{{route('logout')}}" method="POST">@csrf</form>
        <a href="javascript:void(0)" class="nav-link" onclick="document.getElementById('logout').submit()">
          <i class="fas fa-door-open"></i> <span>Logout</span>
        </a>
      </li>

  </aside>
</div>