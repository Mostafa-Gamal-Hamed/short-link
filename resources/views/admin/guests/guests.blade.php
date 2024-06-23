@extends('admin.layout')

@section('body')
    <div class="container mb-5">
        <h1 class="text-center fw-bold mt-5 mb-5">الزوار</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- Current number --}}
        @if ($guest->limit == 0)
            <h2 class="text-danger">لا يوجد رقم</h2>
        @else
            <h2>الرقم الحالى : <span class="text-success">{{ $guest->limit }}</span></h2>
        @endif

        {{-- Update data --}}
        <form action="{{ route('storeGuestLimit',"$guest->id") }}" method="post">
            @csrf
            {{-- Limit --}}
            <div class="form-group">
                <label for="limit">عدد استخدام الروابط : </label>
                <input type="number" class="form-control mt-2 mb-3" id="limit" name="limit"
                    value="{{ old('limit') }}">
                @error('limit')
                    <p class="text-danger">يجب ان يكون الحقل ارقام فقط وغير فارغ</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
    </div>
@endsection