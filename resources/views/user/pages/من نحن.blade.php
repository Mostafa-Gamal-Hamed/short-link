@extends('user.layout')

@section('title')
    من نحن
@endsection

@section('body')
    <div class="container mt-5">
        <h1 class="text-center">من نحن</h1>
        <div class="row mt-5 align-items-center">
            <img src="{{ asset('images/aboutus1.png') }}" width="400px" class="col border-start border-dark" alt="About us">
            <h3 class="col">
                مرحبًا بكم في موقعنا <span
                    class="text-primary">{{ App\Models\Admin\WebsiteName::latest('id')->first()->name }}</span><br> منصة
                مبتكرة لتقديم حلول اختصار الروابط بشكل سريع وفعال. تأسس موقعنا بهدف مساعدة المستخدمين في إدارة ومشاركة
                الروابط الطويلة بسهولة.
            </h3>
        </div>
        <div class="row mt-5 align-items-center">
            <div class="col">
                <h2 class="text-center">رسالتنا</h2>
                <h3>
                    نهدف إلى توفير تجربة مستخدم رائعة من خلال تقديم
                حلول مبتكرة لاختصار الروابط، مما يسمح لنا بالوصول
                إلى أوسع شريحة من المستخدمين.
                نسعى جاهدين لتحقيق التميز من خلال الابتكار، الكفاءة، والأمان.
                </h3>
            </div>
            <img src="{{asset('images/aboutus2.jpg')}}" width="400px" class="col border-end border-dark" alt="About us">
        </div>
        <div class="mt-5 border-top border-dark text-center">
            <img src="{{asset('images/aboutus3.jpg')}}" class="mt-5" width="80%" alt="About us">
            <h3 class="mt-5">إذا كان لديك أي استفسارات أو ترغب في معرفة المزيد عنا، لا تتردد في <a href="{{url("تواصل معنا")}}">التواصل معنا</a></h3>
        </div>
    </div>
@endsection
{{-- 01112091952 --}}