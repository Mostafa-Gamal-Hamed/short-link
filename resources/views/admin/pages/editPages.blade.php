@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">تعديل الصفحات</h1>
        {{-- Messages --}}
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- <form action="{{ route('rename') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="old_name">اختر الصفحة</label>
                <select id="old_name" name="old_name" class="form-control mt-2 mb-4">
                    @foreach ($pages as $page)
                        <option value="{{ $page }}">{{ $page }}</option>
                    @endforeach
                </select>
                @error('old_name')
                    <p class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_name">ادخل الاسم الجديد</label>
                <input type="text" id="new_name" name="new_name" class="form-control mt-2 mb-4">
                @error('new_name')
                    <p class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">تغير الاسم</button>
        </form> --}}

        <form action="{{ route('rename',"$page") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="new_name">ادخل الاسم الجديد</label>
                <input type="text" id="new_name" name="new_name" value="{{ $page }}" class="form-control mt-2 mb-4">
                @error('new_name')
                    <p class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</p>
                @enderror
            </div>

            <div class="mt-3">
                <label for="content" class="form-label">محتوى الصفحة</label>
                <textarea name="content" class="form-control" id="content" cols="" rows="5">{{ $content }}</textarea>
                @error('content')
                    <small class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">تعديل الصفحة</button>
        </form>
    </div>
@endsection
