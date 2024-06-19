@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">تعديل {{ $user->name }}</h1>
        {{-- Messages --}}
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('updateUser', "$user->id") }}" method="post">
            @csrf
            @method('PUT')
            {{-- Number of short links --}}
            <div class="row">
                <div class="Links col">
                    <div class="d-flex align-items-center mb-3">
                        <h2>عدد استخدام الروابط :</h2>
                        <h4 class="text-info">{{ $links }}</h4>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <h2>حد استخدام الروابط :</h2>
                        <h4 class="text-danger">{{ $user->limitUrl }}</h4>
                    </div>
                </div>
                <div class="Qrs col">
                    <div class="d-flex align-items-center mb-3">
                        <h2>عدد استخدام رابط Qr :</h2>
                        <h4 class="text-info">{{ $qrLinks }}</h4>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <h2>حد استخدام Qr :</h2>
                        <h4 class="text-danger">{{ $user->limitQr }}</h4>
                    </div>
                </div>
            </div>

            {{-- Determine short links --}}
            <div class="form-group">
                <label for="number">تحديد عدد استخدام الروابط</label>
                <input type="text" id="number" name="link" value="{{ $user->limitUrl }}" class="form-control mt-2 mb-4" placeholder="حدد الرقم">
                @error('number')
                    <p class="text-danger">يجب ان يكون الحقل رقم صحيح و غير فارغ</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="qr">تحديد عدد استخدام رابط QR</label>
                <input type="text" id="qr" name="qr" value="{{ $user->limitQr }}" class="form-control mt-2 mb-4" placeholder="حدد الرقم">
                @error('qr')
                    <p class="text-danger">يجب ان يكون الحقل رقم صحيح و غير فارغ</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>
        </form>
    </div>
@endsection
