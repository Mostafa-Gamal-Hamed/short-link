@extends('user.layout')

@section('key')
    @if ($siteName->key)
        {{ $siteName->key }}
    @else
        رابط قصير، رابط قصير، قصير، قصير، رابط، رابط، رابط سريع، رابط سريع، اختصار الروابط، اختصار URL، اختصار URL، خدمة
        اختصار
        الروابط
    @endif
@endsection

@section('desc')
    @if ($siteName->desc)
        {{ $siteName->desc }}
    @else
        قم بتقصير الروابط الطويلة بسرعة وسهولة باستخدام موقعنا. احصل على رابط قصير فوري.
    @endif
@endsection

@section('title')
    صنع الروابط القصيرة
@endsection

@section('body')
    {{-- Header & Url --}}
    <header class="px-3">
        <div class="section text-light p-3" style="background-color: #3c65ae; border-radius: 0px 0px 20px 20px;">
            <div class="row flexColumn">
                <div class="col column">
                    <p>اختصار الرابط</p>
                    <h3>استمتع بالتحكم الكامل في الروابط القصيرة الخاصة بك</h3>
                    <p>
                        النظام الأساسي <strong>{{ App\Models\Admin\WebsiteName::latest('id')->first()->name }}</strong>
                        الكامل وإدارة الارتباط وتحليلات الارتباط والروابط العميقة ومولد رموز QR
                        والرابط في السيرة الذاتية. قم بتقصير الروابط الخاصة بك وتمييزها وإدارتها وتتبعها ومشاركتها بسهولة.
                    </p>
                </div>
                <div class="col text-center column">
                    <img src="{{ asset('images/head.png') }}" class="img-fluid rounded" width="350px" height="350px"
                        alt="">
                </div>
            </div>
            {{-- Url --}}
            <form class="mt-5" id="shorten-form">
                <input type="text" id="original_url" name="original_url" class="form-control shadow"
                    placeholder="ادخل الرابط" required>
                @error('original_url')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-info btn-block mt-3">تقصير</button>
            </form>
            <div class="text-light fs-5 fw-bold mt-3 rounded" id="shortenedLink" style="display: none;">
                <a href="" class="nav-link overflow-auto" id="result" target="_blank"></a>
                <div class="d-flex justify-content-start align-items-center gap-4 mt-3">
                    <button class="btn btn-warning" id="copyButton">نسخ</button>
                    <i class="fa-solid fa-thumbs-up fs-3" id="like" style="display: none;"></i>
                </div>
            </div>
        </div>
    </header>

    {{-- Possibilities --}}
    <div class="container mb-5">
        <div class="text-center mt-5 p-5 Possibilities">
            <h2 class="fw-bold">رابط واحد قصير، رائع.</h2>
            <h6>
                يعد الرابط القصير أداة تسويقية قوية عندما تستخدمه بعناية. إنه ليس مجرد رابط ولكنه وسيط بين عميلك ووجهته.
                يتيح لك الرابط القصير جمع الكثير من البيانات حول عملائك وسلوكياتهم.
                <h6>
        </div>
    </div>

    {{-- Cards --}}
    <div class="cards mt-5 bg-light p-5 Possibilities">
        <div class="row">
            <div class="cardInfo col-md-4">
                <div class="card shadow bg-info">
                    <div class="card-body">
                        <div class="text-center text-light">
                            <i class="fa-solid fa-bars-progress fs-1 mb-2"></i>
                        </div>
                        <h5 class="card-title text-center">إدارة الارتباط</h5>
                        <p class="card-text mt-2">
                            <strong>{{ App\Models\Admin\WebsiteName::latest('id')->first()->name }}</strong> هو أفضل خدمة
                            لإدارة الروابط القصيرة لتتبع الروابط القصيرة والعلامات التجارية ومشاركتها.
                        </p>
                    </div>
                </div>
            </div>
            <div class="cardInfo col-md-4">
                <div class="card shadow text-light" style="background: linear-gradient(45deg, #0067F4 0%, #2148b1 100%);">
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fa-solid fa-link fs-1 mb-2"></i>
                        </div>
                        <h5 class="card-title text-center">تقصير عناوين الروابط</h5>
                        <p class="card-text mt-2">
                            حل شامل للمساعدة في جعل كل نقطة اتصال بين المحتوى الخاص بك وجمهورك أكثر قوة.
                        </p>
                    </div>
                </div>
            </div>
            <div class="cardInfo col-md-4">
                <div class="card shadow bg-dark text-light">
                    <div class="card-body">
                        <div class="text-center">
                            <i class="fa-solid fa-qrcode fs-1 mb-2"></i>
                        </div>
                        <h5 class="card-title text-center">رموز الاستجابة السريعة</h5>
                        <p class="card-text mt-2">
                            حلول رمز الاستجابة السريعة لكل عميل وتجربة عمل وعلامة تجارية.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Start Qr --}}
    <div class="row p-2 justify-content-center align-items-center mt-5 flexColumn" style="background-color: #e6e6e6;">
        <div class="col column">
            <div class="qrCode mt-5">
                <img src="{{ asset('images/QR-home.png') }}" class="img-fluid border" alt="">
            </div>
        </div>
        <div class="col column">
            <h1>رموز الاستجابة السريعة</h1>
            <h4 class="mt-3">
                رموز QR سهلة الاستخدام وديناميكية وقابلة للتخصيص لحملاتك التسويقية. تحليل الإحصائيات وتحسين استراتيجية
                التسويق الخاصة بك وزيادة المشاركة.
            </h4>
            <a href="{{ url('codeQr') }}" class="btn btn-primary btn-lg mt-3">ابدأ</a>
        </div>
    </div>

    {{-- Url short link --}}
    <script>
        document.getElementById('shorten-form').addEventListener('submit', function(e) {
            e.preventDefault();
            let url = document.getElementById('original_url').value;

            fetch('/shorten', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        original_url: url
                    })
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('shortenedLink').style.display = 'block';
                    document.getElementById('result').innerText = `${data.short_url}`;
                    document.getElementById('result').href = `${data.original_url}`;
                });
        });

        // Copy link
        document.getElementById('copyButton').addEventListener('click', function() {
            var copyText = document.getElementById('result').innerText;
            navigator.clipboard.writeText(copyText).then(function() {
                document.getElementById('like').style.display = 'block';
                // alert("تم نسخ الرابط: " + copyText);
            }, function(err) {
                console.error('Error copying text: ', err);
            });
        });
    </script>
@endsection
