@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">اضافة صفحة</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('storePage') }}" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الصفحة</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">يجب ان يكون الحقل حروف و غير فارغ والا يزيد عن 255 حرف</small>
                @enderror
            </div>
            <div class="mt-3">
                <label for="content" class="form-label">محتوى الصفحة</label>
                <textarea name="content" class="form-control" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">حفظ</button>
        </form>
    </div>
@endsection
