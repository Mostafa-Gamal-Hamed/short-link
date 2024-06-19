<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ url('الرئيسية') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>لوحة التحكم</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            {{-- Dashboard --}}
            <a href="{{ url('الرئيسية') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>لوحة
                التحكم</a>

            {{-- Web --}}
            <a href="{{ route('site') }}" class="nav-item nav-link"><i
                    class="fas fa-sitemap text-primary"></i>الموقع</a>

            {{-- Pages --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-swatchbook text-success"></i>الصفحات</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('pages') }}" class="dropdown-item">الصفحات</a>
                    <a href="{{ route('addPage') }}" class="dropdown-item">اضافة صفحة</a>
                    <a href="{{ route('showPages') }}" class="dropdown-item">عرض الصفحات</a>
                </div>
            </div>

            {{-- Users --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fas fa-users text-warning"></i>المستخدمين</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('users') }}" class="dropdown-item">المشتركين</a>
                    <a href="{{ route('messages') }}" class="dropdown-item">الرسائل</a>
                </div>
            </div>

            {{-- Pages --}}
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-film text-danger"></i>الاعلانات</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('ads') }}" class="dropdown-item">كل الاعلانات</a>
                    <a href="{{ route('addAds') }}" class="dropdown-item">اضافة اعلان</a>
                </div>
            </div>

        </div>
    </nav>
</div>
<!-- Sidebar End -->
