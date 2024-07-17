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
        @if ($title == "")
            <h2 class="text-danger">لا يوجد اسم</h2>
        @else
            <h2>اسم الموقع الحالى : <span class="text-success">{{ $title->name }}</span></h2>
        @endif

        {{-- Change site name --}}
        @if ($title == "")
            <form action="{{ route('storeName') }}" method="post" class="mb-5">
                @csrf
                {{-- Name --}}
                <div class="form-group">
                    <label for="name">اسم الموقع الجديد :</label>
                    <input type="text" class="form-control mt-2 mb-3" id="name" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">يجب ان يكون الاسم حروف و اكثر من حرفين وغير فارغ</p>
                    @enderror
                </div>
                {{-- Seo --}}
                <div class="container px-4 p-2 border mb-5">
                    <h5>سيو</h5>
                    {{-- Keywords --}}
                    <div class="mb-3">
                        <label for="key" class="form-label">الكلمات مفتاحية</label>
                        <input type="text" name="key" id="key" class="form-control"
                            value="{{ old('key') }}">
                        <small id="keyHint" class="form-text text-muted">افصل بين الكلمات بفاصلة (,)</small>
                        <small id="keyError" class="text-danger d-none">يجب أن يكون الحقل غير فارغ ويحتوي على , أو
                            أحرف</small>
                        @error('key')
                            <small class="text-danger">يجب ان يكون الحقل غير فارغ ويحتوى على , او احرف</small>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="desc" class="form-label">وصف الصفحة</label>
                        <input type="text" name="desc" id="desc" class="form-control"
                            value="{{ old('desc') }}">
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

                <button type="submit" class="btn btn-primary">تحديث</button>
            </form>
        @else
            <form action="{{ route('updateName', "{$title->id}") }}" method="post" class="mb-5">
                @csrf
                @method('PUT')
                {{-- Name --}}
                <div class="form-group">
                    <label for="name">اسم الموقع الجديد :</label>
                    <input type="text" class="form-control mt-2 mb-3" id="name" name="name"
                        value="{{ $title->name }}">
                    @error('name')
                        <p class="text-danger">يجب ان يكون الاسم حروف و اكثر من حرفين وغير فارغ</p>
                    @enderror
                </div>
                {{-- Seo --}}
                <div class="container px-4 p-2 border mb-5">
                    <h5>سيو</h5>
                    {{-- Keywords --}}
                    <div class="mb-3">
                        <label for="key" class="form-label">الكلمات مفتاحية</label>
                        <input type="text" name="key" id="key" class="form-control"
                            value="{{ $title->key }}">
                        <small id="keyHint" class="form-text text-muted">افصل بين الكلمات بفاصلة (,)</small>
                        <small id="keyError" class="text-danger d-none">يجب أن يكون الحقل غير فارغ ويحتوي على , أو
                            أحرف</small>
                        @error('key')
                            <small class="text-danger">يجب ان يكون الحقل غير فارغ ويحتوى على , او احرف</small>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="desc" class="form-label">وصف الصفحة</label>
                        <input type="text" name="desc" id="desc" class="form-control"
                            value="{{ $title->desc }}">
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

                <button type="submit" class="btn btn-primary">تحديث</button>
            </form>
        @endif
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
