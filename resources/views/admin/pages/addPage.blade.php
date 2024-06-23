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

        <form action="{{ route('storePage') }}" method="post" class="mb-5" id="seoForm">
            @csrf
            {{-- Name --}}
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الصفحة</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger">يجب ان يكون الحقل حروف و غير فارغ والا يزيد عن 255 حرف</small>
                @enderror
            </div>

            {{-- Seo --}}
            <div class="container px-4 p-2 border">
                <h5>سيو</h5>
                {{-- Keywords --}}
                <div class="mb-3">
                    <label for="key" class="form-label">الكلمات مفتاحية</label>
                    <input type="text" name="key" id="key" class="form-control" value="{{ old('key') }}">
                    <small id="keyHint" class="form-text text-muted">افصل بين الكلمات بفاصلة (,)</small>
                    <small id="keyError" class="text-danger d-none">يجب أن يكون الحقل غير فارغ ويحتوي على , أو أحرف</small>
                    @error('key')
                        <small class="text-danger">يجب ان يكون الحقل غير فارغ ويحتوى على , او احرف</small>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="desc" class="form-label">وصف الصفحة</label>
                    <input type="text" name="desc" id="desc" class="form-control" value="{{ old('desc') }}">
                    <small id="descError" class="text-danger d-none">يجب أن يكون الحقل غير فارغ</small>
                    @error('desc')
                        <small class="text-danger">يجب ان يكون الحقل غير فارغ</small>
                    @enderror
                </div>
                <div class="mt-5">
                    <h3>معاينة SEO</h3>
                    <p><strong>الكلمات المفتاحية:</strong> <span id="previewKeywords"></span></p>
                    <p><strong>وصف الصفحة:</strong> <span id="previewDesc"></span></p>
                </div>
            </div>

            {{-- Content --}}
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

    <script>
        $(document).ready(function() {
            $('#key').on('input', function() {
                $('#previewKeywords').text($(this).val());
            });

            $('#desc').on('input', function() {
                $('#previewDesc').text($(this).val());
            });

            $('#seoForm').on('submit', function(event) {
                let isValid = true;
                let keywords = $('#key').val().trim();
                let description = $('#desc').val().trim();

                if (keywords === '' || !keywords.includes(',')) {
                    $('#keyError').removeClass('d-none');
                    isValid = false;
                } else {
                    $('#keyError').addClass('d-none');
                }

                if (description === '') {
                    $('#descError').removeClass('d-none');
                    isValid = false;
                } else {
                    $('#descError').addClass('d-none');
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endsection
