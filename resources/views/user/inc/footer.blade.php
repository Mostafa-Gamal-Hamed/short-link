{{-- Ads --}}
@foreach ($down as $ads)
    <div class="d-flex w-100 text-center m-0 p-2 mb-3 text-light ads">
        <a href="{{ $ads->link }}" class="w-100 nav-link">
            <div class="text-center">
                <img src="{{ asset("storage/$ads->image") }}" class="img-fluid" alt="Ads">
                <h4>{{ $ads->title }}</h4>
                <h5>{{ $ads->description }}</h5>
            </div>
        </a>
    </div>
@endforeach

{{-- Footer --}}
<footer class="mt-5">
    <div class="card">
        <div class="card-body row m-0">
            <div class="col border-start">
                <div class="d-flex align-items-center">
                    Made by : <a href="https://www.linkedin.com/in/mustafa-hamed-89b834252?" class="nav-link text-dark">MG</a> | @2024
                </div>
            </div>
            <div class="col text-end">
                <a href="{{ url('السياسة و الخصوصية') }}" class="text-light">سياسة الخصوصية والشروط</a>
            </div>
        </div>
    </div>
</footer>

{{-- Js --}}
<script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/js/fontawesome.js') }}"></script>
</body>

</html>
