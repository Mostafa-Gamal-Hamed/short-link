
<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                {{-- <a href="{{ route('dashboard') }}" class="dropdown-item">لوحة التحكم</a> --}}
                <a href="{{ route('profile.edit') }}" class="dropdown-item">الصفحة الشخصية</a>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn dropdown-item">تسجيل خروج</button>
                </form>
            </div>
        </div>
    </div>
    <a href="{{ url('الرئيسية') }}" class="navbar-brand d-flex d-lg-none me-4 mx-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
</nav>
<!-- Navbar End -->
