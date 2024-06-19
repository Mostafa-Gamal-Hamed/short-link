@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">كل الصفحات</h1>
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
                    <th>اخفاء</th>
                    <th>تعديل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $page }}</td>
                        <td>
                            <a href="{{ route('hidePage', "$page") }}" class="btn btn-secondary">اخفاء</a>
                        </td>
                        <td>
                            <a href="{{ route('edit', "$page") }}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('deletePage', "$page") }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- Hide pages --}}
                @foreach ($hidePages as $hide)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $hide }}</td>
                        <td>
                            <a href="{{ route('showPage', "$hide") }}" class="btn btn-warning">اظهار</a>
                        </td>
                        <td>
                            <a href="{{ route('edit', "$hide") }}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="{{ route('deletePage', "$hide") }}" method="post">
                                @csrf
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
