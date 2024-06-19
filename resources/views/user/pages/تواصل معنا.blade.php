@extends('user.layout')

@section('body')
<div class="container mt-5">
    <h1 class="text-center">تواصل معنا</h1>
    {{-- Messages --}}
    @if (session('success'))
        <div class="alert alert-success text-center"><h4>{{ session('success') }}</h4></div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger text-center"><h4>{{ session('error') }}</h4></div>
    @endif

    <div class="shadow bg-light mt-5 p-3">
        <form action="{{ route('contactUs') }}" method="post">
            @csrf
            {{-- Name --}}
            <div class="form-group mb-4">
                <label for="name">ادخل الاسم</label>
                <input type="text" name="name" id="name" class="form-control mt-2">
                @error("name")
                    <small class="text-danger">يجب ان يكون الحقل حروف و لا يقل عن 3 حروف</small>
                @enderror
            </div>
            {{-- Email --}}
            <div class="form-group mb-4">
                <label for="name">الحساب</label>
                <input type="email" name="email" id="email" class="form-control mt-2">
                @error("name")
                <small class="text-danger">يجب ان يكون الحقل حساب و ان لا يكون فارغا</small>
                @enderror
            </div>
            {{-- Subject --}}
            <div class="form-group mb-4">
                <label for="name">عنوان الرسالة</label>
                <input type="text" name="subject" id="subject" class="form-control mt-2">
                @error("name")
                    <small class="text-danger">يجب ان لا يكون الحقل فارغا</small>
                @enderror
            </div>
            {{-- Message --}}
            <div class="form-group mb-4">
                <label for="name">الرسالة</label>
                <textarea name="message" id="message" class="form-control mt-2" cols="30" rows="10"></textarea>
                @error("name")
                <small class="text-danger">يجب ان لا يكون الحقل فارغا</small>
                @enderror
            </div>

            <button class="btn btn-primary px-5">أرسال</button>
        </form>
    </div>
</div>

@endsection
