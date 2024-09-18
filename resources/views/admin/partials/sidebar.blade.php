<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="{{ asset('assets/dashboard/images/faces/face2.jpg') }}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        Administrator
                    </p>
                    <p class="sidebar-designation">
                        Welcome Zidane
                    </p>
                </div>
            </div>

            <p class="sidebar-menu-title">Dash menu</p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.produk.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Produk</span>
            </a>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.supply-chain.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Supply Chain</span>
            </a>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.checkout') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Order</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.supplier.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Supplier</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.purchase.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Purchase Products</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.kategori.index') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Kategori</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.pesanan.riwayat') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Riwayat Pesanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.logout') }}">
                <i class="typcn typcn-device-desktop menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </li> --}}


    </ul>
</nav>
