@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">تعديل الصفحات</h1>
        {{-- Messages --}}
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('rename', "$page") }}" method="post" id="seoForm"rea>
            @csrf
            {{-- Name --}}
            <div class="form-group">
                <label for="new_name">ادخل الاسم الجديد</label>
                <input type="text" id="new_name" name="new_name" value="{{ $page }}"
                    class="form-control mt-2 mb-4">
                @error('new_name')
                    <p class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</p>
                @enderror
            </div>

            {{-- Seo --}}
            <div class="container px-4 p-2 border">
                <h5>سيو</h5>
                {{-- Keywords --}}
                <div class="mb-3">
                    <label for="key" class="form-label">الكلمات مفتاحية</label>
                    <input type="text" name="key" id="key" class="form-control" value="{{ $key }}">
                    <small id="keyHint" class="form-text text-muted">افصل بين الكلمات بفاصلة (,)</small>
                    <small id="keyError" class="text-danger d-none">يجب أن يكون الحقل غير فارغ ويحتوي على , أو أحرف</small>
                    @error('key')
                        <small class="text-danger">يجب ان يكون الحقل غير فارغ ويحتوى على , او احرف</small>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="desc" class="form-label">وصف الصفحة</label>
                    <input type="text" name="desc" id="desc" class="form-control" value="{{ $desc }}">
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
                <textarea name="content" class="form-control" id="content" cols="" rows="10">{{ $body }}</textarea>
                @error('content')
                    <small class="text-danger">يجب ان يكون الحقل حروف و غير فارغ</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">تعديل الصفحة</button>
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

        // Edit in content
        CKEDITOR.replace('content', {
            extraPlugins: 'justify', // Load the justify plugin for text alignment
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'
                    ]
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks']
                }
            ]
        });
    </script>
@endsection
