<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="index.html"><img src="{{ '/assets/compiled/svg/logo.svg' }}" alt="Logo"
                            srcset="" /></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-title">Raise Support</li>

                <li class="sidebar-item">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="bi bi-book-half"></i>
                        <span>Buku</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/kategori" class="sidebar-link">
                        <i class="bi bi-bookmarks-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/koleksi" class="sidebar-link">
                        <i class="bi bi-collection"></i>
                        <span>Koleksi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="/peminjaman" class="sidebar-link">
                        <i class="bi bi-cart"></i>
                        <span>Peminjaman</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="/admin" class="sidebar-link">
                        <i class="bi bi-person-add"></i>
                        <span>Tambah User</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button role="button" type="submit" class="sidebar-link">
                            <i class="bi bi-box-arrow-left"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
