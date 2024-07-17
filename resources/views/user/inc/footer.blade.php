{{-- Ads --}}
<div class="row w-100 gap-3 text-center m-0 p-2 mb-3 ads overflow-y-auto">
    @foreach ($down as $ads)
        <div class="text-center col mx-1 d-flex justify-content-center">
            <a href="{{ $ads->link }}" class="w-50 nav-link">
                @if ($ads->image)
                    <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                @endif
                <h4>{{ $ads->title }}</h4>
            </a>
            <h5>{{ $ads->description }}</h5>
        </div>
    @endforeach
</div>

{{-- Footer --}}
<footer class="mt-5">
    <div class="card">
        <div class="card-body row m-0">
            <div class="col">
                <div class="d-flex align-items-center">
                    Made by : <a href="https://www.linkedin.com/in/mustafa-hamed-89b834252?" class="nav-link text-dark">MG</a> | @2024
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Js --}}
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/fontawesome.js') }}"></script>

</body>

</html>
