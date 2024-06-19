@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">الرسائل</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- Table --}}
        <table class="table table-striped mb-5 text-center">
            <thead>
                <tr>
                    <th>العدد</th>
                    <th>الاسم</th>
                    <th>الحساب</th>
                    <th>عنوان الرسالة</th>
                    <th>عرض</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>
                            <a href="{{ route('showMessage',"$message->id") }}" class="btn btn-primary">
                                <i class="fas fa-info"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route("deleteMessage","$message->id") }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
