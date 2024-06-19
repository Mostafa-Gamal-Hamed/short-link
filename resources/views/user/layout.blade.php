{{-- Fetch ads --}}
@php
    $up    = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'الاعلى')->get();
    $right = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'يمين')->get();
    $down  = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'الاسفل')->get();
    $left  = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'يسار')->get();
@endphp

@include('user.inc.header')

@include('user.inc.navbar')

<div class="row m-0 p-0">
    <div class="col-1 mt-5">
        @foreach ($right as $ads)
            <div class="d-flex flex-column mb-3 text-light adsRL" style="position: relative;">
                <a href="{{ $ads->link }}" class="nav-link">
                    <div class="text-center side">
                        <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                        <h4>{{ $ads->title }}</h4>
                        <h5>{{ $ads->description }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- Body content --}}
    <div class="col-10">
        @yield('body')
    </div>

    <div class="col-1 mt-5">
        @foreach ($left as $ads)
            <div class="d-flex flex-column mb-3 text-light adsRL">
                <a href="{{ $ads->link }}" class="nav-link">
                    <div class="text-center">
                        <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                        <h4>{{ $ads->title }}</h4>
                        <h5>{{ $ads->description }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</div>

@include('user.inc.footer')
