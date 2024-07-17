@php
    // Get file
    $path = resource_path('views/user/pages');
    $files = File::files($path);
    $pages = [];

    foreach ($files as $file) {
        $fileName = pathinfo($file, PATHINFO_FILENAME);
        $fileName = str_replace('.blade', '', $fileName);
        if ($fileName !== 'السياسة و الخصوصية') {
            $pages[] = $fileName;
        }
    }
@endphp

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand text-light"
            href="{{ url('/') }}">{{ App\Models\Admin\WebsiteName::latest('id')->first()->name }}</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav px-3">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ url('/') }}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('codeQr') }}">رمز الاستجابة السريعة Qr</a>
                </li>
                @foreach ($pages as $page)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("$page") }}">{{ $page }}</a>
                    </li>
                @endforeach
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">تسجيل دخول</a>
                    </li>
                @endguest
                @auth
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            الحساب
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="{{ url('dashboard') }}" class="nav-link dashboard">لوحة التحكم</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="nav-link">خروج</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- Ads --}}
<div class="row text-center mb-4 p-2 mx-2 ads overflow-y-auto" style="width:99%;">
    @foreach ($up as $ads)
        <div class="text-center col mx-1">
            <a href="{{ $ads->link }}" class="w-100 nav-link" style="width: 100%">
                @if ($ads->image)
                    <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                @endif
                <h4>{{ $ads->title }}</h4>
                <h5>{{ $ads->description }}</h5>
            </a>
        </div>
    @endforeach
</div>
