@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">اضافة اعلان</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- Form --}}
        <form action="{{ route('storeAds') }}" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">الاسم</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">يجب ان يكون الحقل حروف و غير فارغ والا يزيد عن 255 حرف</small>
                @enderror
            </div>
            {{-- Description --}}
            <div class="mt-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <small class="text-danger">يجب ان يكون الحقل غير فارغ</small>
                @enderror
            </div>
            {{-- Image --}}
            <div class="mt-3">
                <label for="image" class="form-label">الصورة</label>
                <input type="file" name="image" class="form-control" id="image">
                @error('image')
                    <small class="text-danger">يجب ان تكون الصورة jpg,jpeg,png,gif</small>
                @enderror
            </div>
            {{-- Link --}}
            <div class="mb-3">
                <label for="link" class="form-label">الرابط</label>
                <input type="link" name="link" id="link" class="form-control" value="{{ old('link') }}">
                @error('link')
                    <small class="text-danger">يجب ان يكون الحقل عنوان رابط</small>
                @enderror
            </div>
            {{-- Status --}}
            <div class="mb-3">
                <label for="status" class="form-label">الحالة</label>
                <select name="status" id="status" class="form-control">
                    <option value="activate">مفعل</option>
                    <option value="inactivate">غير مفعل</option>
                </select>
                @error('status')
                    <small class="text-danger">
                        يجب ان يكون الحقل مفعل او غير مفعل
                    </small>
                @enderror
            </div>
            {{-- Show --}}
            <div class="mb-3">
                <label for="showAds" class="form-label">اين تريد ان تعرض</label>
                <select name="showAds" id="showAds" class="form-control">
                    <option value="الاعلى">الاعلى</option>
                    <option value="يمين">يمين</option>
                    <option value="الاسفل">الاسفل</option>
                    <option value="يسار">يسار</option>
                </select>
                @error('showAds')
                <small class="text-danger">
                    يجب ان يكون اختيار الحقل الاعلى او الاسفل او يمين او يسار
                </small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">حفظ</button>
        </form>
    </div>
@endsection