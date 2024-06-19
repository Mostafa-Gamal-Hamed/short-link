@extends('admin.layout')

@section('body')
    <div class="container">
        <h1 class="text-center fw-bold mt-5 mb-5">كل الاعلانات</h1>
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
                    <th>الوصف</th>
                    <th>الصورة</th>
                    <th>الرابط</th>
                    <th>الحالة</th>
                    <th>تفاصيل</th>
                    <th>حذف</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $ads)
                    <tr>
                        <td>{{$num++}}</td>
                        <td>{{$ads->title}}</td>
                        <td>{{$ads->description}}</td>
                        <td>
                            <img src="{{asset("storage/$ads->image")}}" width="100px" alt="Ads">
                        </td>
                        <td>{{$ads->link}}</td>
                        <td>{{$ads->status}}</td>
                        <td>
                            <a href="{{ route('editAds',"$ads->id") }}"><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <form action="{{ route("deleteAds","$ads->id") }}" method="post">
                                @csrf
                                @method("DELETE")
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