@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">عرض الصفحات</h1>
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
                    <th>رقم</th>
                    <th>الاسم</th>
                    <th>تعديل</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{$num++}}</td>
                        <td>{{$page}}</td>
                        <td>
                            <a href="{{ route('edit',"$page") }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
