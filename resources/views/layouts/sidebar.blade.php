<aside id="sidebar">
    <div class="d-flex">
        <button id="toggle-btn" type="button">
            <i class="fa-solid fa-border-none"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">OnlineShop</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item {{ request()->segment('1') == 'home-admin' ? 'actived' : '' }}">
            <a href="{{ url('/home-admin') }}" class="sidebar-link">
                <i class="fa-solid fa-house-user"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->segment('1') == 'kategori' ? 'actived' : '' }}">
            <a href="{{ url('/kategori') }}" class="sidebar-link">
                <i class="fa-solid fa-bars"></i>
                <span>Data Kategori</span>
            </a>
        </li>
        <li class="sidebar-item {{ request()->segment('1') == 'product-admin' ? 'actived' : '' }}">
            <a href="{{ url('/product-admin') }}" class="sidebar-link">
                <i class="fa-solid fa-cart-shopping"></i>
                <span>Data Product</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
            @csrf
        </form>
        <a href="#"
            onclick="event.preventDefault(); if(confirm('Anda yakin melakukan logout?')) document.getElementById('logout-form').submit();"
            class="sidebar-link">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>
