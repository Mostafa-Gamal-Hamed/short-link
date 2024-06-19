@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">{{ $message->name }}</h1>

        <div class="mb-5 p-5">
            <div>
                {{-- Name --}}
                <div class="mb-4">
                    <h3 class="mx-2">الاسم</h3>
                    <h4 class="text-info">{{ $message->name }}</h4>
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <h2 class="mx-2">الحساب</h2>
                    <h4 class="text-info">{{ $message->email }}</h4>
                </div>

                {{-- Subject --}}
                <div class="mb-4">
                    <h2 class="mx-2">عنوان الرسالة</h2>
                    <h4 class="text-info">{{ $message->subject }}</h4>
                </div>

                {{-- Message --}}
                <div class="mb-5">
                    <h2 class="mx-2">الرسالة</h2>
                    <textarea cols="0" style="width: 100%; border:none;" readonly>
                        {{ $message->message }}
                    </textarea>
                </div>

                <div>
                    <form action="{{ route("deleteMessage","$message->id") }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            حذف الرسالة
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection