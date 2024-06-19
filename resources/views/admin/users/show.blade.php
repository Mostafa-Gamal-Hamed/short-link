@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">{{ $user->name }}</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="mb-5">
            <div class="row">
                {{-- Name --}}
                <div class="col">
                    <Div class="d-flex align-items-center mb-2">
                        <h2 class="mx-2">الاسم: </h2>
                        <h4 class="text-info">{{ $user->name }}</h4>
                    </Div>
                </div>

                {{-- Email --}}
                <div class="col">
                    <Div class="d-flex align-items-center mb-2">
                        <h2 class="mx-2">الحساب: </h2>
                        <h4 class="text-info">{{ $user->email }}</h4>
                    </Div>
                </div>
            </div>

            {{-- Links Short --}}
            <div class="row">
                {{-- Links --}}
                <div class="col">
                    <Div class="d-flex align-items-center mb-2">
                        <h2 class="mx-2">عدد استخدام الروابط: </h2>
                        <h4 class="text-info">{{ $links }}</h4>
                    </Div>
                    <div class="d-flex align-items-center mb-2">
                        <h2>حد استخدام الروابط : </h2>
                        <h4 class="text-danger">{{ $user->limitUrl }}</h4>
                    </div>
                </div>

                {{-- Qr --}}
                <div class="col">
                    <Div class="d-flex align-items-center mb-2">
                        <h2 class="mx-2">عدد استخدام رابط Qr: </h2>
                        <h4 class="text-info">{{ $qrLinks }}</h4>
                    </Div>
                    <div class="d-flex align-items-center mb-2">
                        <h2>حد استخدام رابط Qr : </h2>
                        <h4 class="text-danger">{{ $user->limitQr }}</h4>
                    </div>
                </div>
            </div>

            <a href="{{ route('editUser', "$user->id") }}" class="btn btn-primary mt-5 px-5">
                تعديل
            </a>
        </div>
    </div>
@endsection
