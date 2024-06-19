@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">كل المشتركين</h1>
        {{-- Messages --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        {{-- Table --}}
        <table class="table table-striped table-hover mb-5 text-center">
            <thead>
                <tr>
                    <th>العدد</th>
                    <th>الاسم</th>
                    <th>الحساب</th>
                    <th>حد استخدام الرابط</th>
                    <th>حد استخدام Qr</th>
                    <th>التفاصيل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$num++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->limitUrl}}</td>
                        <td>{{$user->limitQr}}</td>
                        <td>
                            <a href="{{ route('showUser',"$user->id") }}" class="btn btn-primary">
                                <i class="fas fa-info"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route("deleteUser","$user->id") }}" method="post">
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
