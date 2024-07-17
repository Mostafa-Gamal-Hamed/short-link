{{-- Fetch ads --}}
@php
    $up    = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'الاعلى')->get();
    $right = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'يمين')->get();
    $down  = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'الاسفل')->get();
    $left  = App\Models\Admin\Ads::where('status', 'activate')->where('showAds', 'يسار')->get();
@endphp

@include('user.inc.header')

@include('user.inc.navbar')

<div class="row m-0 p-0 ">
    <div class="col-2 p-0 mt-3">
        @foreach ($right as $ads)
            <div class="d-flex flex-column adsRL" style="position: relative;">
                <div class="text-center side">
                    <a href="{{ $ads->link }}" class="nav-link">
                        @if ($ads->image)
                            <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                        @endif
                        <h4>{{ $ads->title }}</h4>
                        <h5>{{ $ads->description }}</h5>
                    </a>
                </div>
            </div>
            <br>
        @endforeach
    </div>

    {{-- Body content --}}
    <div class="col-8 p-3">
        @yield('body')
    </div>

    <div class="col-2 p-0 mt-3">
        @foreach ($left as $ads)
            <div class="d-flex flex-column mb-5 adsRL">
                <div class="text-center">
                    <a href="{{ $ads->link }}" class="nav-link">
                        @if ($ads->image)
                            <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                        @endif
                        <h4>{{ $ads->title }}</h4>
                        <h5>{{ $ads->description }}</h5>
                    </a>
                </div>
            </div>
            <br>
        @endforeach
    </div>

</div>

@include('user.inc.footer')
