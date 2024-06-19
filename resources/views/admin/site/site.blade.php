@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">خاص بالموقع</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- Site name --}}
        @if ($title->isEmpty())
            <h2 class="text-danger">لا يوجد اسم</h2>
        @else
            <h2>اسم الموقع الحالى : <span class="text-success">{{ $title[0]->name }}</span></h2>
        @endif

        {{-- Change site name --}}
        @if ($title->isEmpty())
            <form action="{{ route('storeName') }}" method="post" class="mb-5">
                @csrf
                <div class="form-group">
                    <label for="name">اسم الموقع الجديد :</label>
                    <input type="text" class="form-control mt-2 mb-3" id="name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">يجب ان يكون الاسم حروف و اكثر من حرفين وغير فارغ</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">تحديث</button>
            </form>
        @else
            <form action="{{ route('updateName', "{$title[0]->id}") }}" method="post" class="mb-5">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">اسم الموقع الجديد :</label>
                    <input type="text" class="form-control mt-2 mb-3" id="name" name="name"
                        value="{{ $title[0]->name }}">
                    @error('name')
                        <p class="text-danger">يجب ان يكون الاسم حروف و اكثر من حرفين وغير فارغ</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">تحديث</button>
            </form>
        @endif
    </div>
@endsection
