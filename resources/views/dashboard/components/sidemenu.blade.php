<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="{{ route('home') }}">
            <img src="{{ asset('dashboard/assets/img/brand/logo-light.png') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ asset('dashboard/assets/img/brand/icon-light.png') }}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{ asset('dashboard/assets/img/brand/logo.png') }}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{ asset('dashboard/assets/img/brand/icon.png') }}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-header"><span class="nav-label">Dashboard</span></li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-home sidemenu-icon"></i>
                    <span class="sidemenu-label">Dashboard</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i
                        class="ti-shopping-cart-full sidemenu-icon"></i><span class="sidemenu-label">E-Commerce</span><i
                        class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-dashboard.html">Dashboard</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-products.html">Products</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-product-details.html">Product Details</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-cart.html">Cart</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-checkout.html">Checkout</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-orders.html">Orders</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ecommerce-account.html">Account</a>
                    </li>
                </ul>
            </li> --}}
            @role('user')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.settings.index') }}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-cogs sidemenu-icon"></i>
                        <span class="sidemenu-label">Pengaturan Umum</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.brideman.index') }}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-person sidemenu-icon"></i>
                        <span class="sidemenu-label">Mempelai Pria</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.bridewoman.index') }}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-person-dress sidemenu-icon"></i>
                        <span class="sidemenu-label">Mempelai Wanita</span>
                    </a>
                </li>
                <li class="nav-item {{ (\Request::routeIs('user.lovestory.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.lovestory.index') }}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-heart sidemenu-icon"></i>
                        <span class="sidemenu-label">Cerita Cinta</span>
                    </a>
                </li>
                <li class="nav-item {{ (\Request::routeIs('user.eventinformation.*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('user.eventinformation.index') }}"><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-calendar-days sidemenu-icon"></i>
                        <span class="sidemenu-label">Informasi Acara</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-envelope sidemenu-icon"></i>
                        <span class="sidemenu-label">Informasi Undangan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-plus sidemenu-icon"></i>
                        <span class="sidemenu-label">Acara Tambahan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-comment-dots sidemenu-icon"></i>
                        <span class="sidemenu-label">Sesuaikan Bahasa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-share-from-square sidemenu-icon"></i>
                        <span class="sidemenu-label">Kirim Undangan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-photo-film sidemenu-icon"></i>
                        <span class="sidemenu-label">Galeri Foto</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-music sidemenu-icon"></i>
                        <span class="sidemenu-label">Latar Belakang Musik</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-sliders     sidemenu-icon"></i>
                        <span class="sidemenu-label">Slide Gambar</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-video sidemenu-icon"></i>
                        <span class="sidemenu-label">Gallery Video</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-gift sidemenu-icon"></i>
                        <span class="sidemenu-label">Kado Undangan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="fas fa-comments sidemenu-icon"></i>
                        <span class="sidemenu-label">Doa dan Harapan</span>
                    </a>
                </li>
            @endrole
        </ul>
    </div>
</div>
<!-- End Sidemenu -->
