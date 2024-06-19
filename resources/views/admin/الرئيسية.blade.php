@extends('admin.layout')

@section('body')
    <div class="contanier">
        <h1 class="text-center fw-bold mt-5 mb-5">لوحة التحكم</h1>

        <div class="container-fluid pt-4 px-4">
            {{-- Quick details --}}
            <div class="row g-4">
                {{-- Site name --}}
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">اسم الموقع</p>
                            <h6 class="mb-0">{{ $siteName[0]->name }}</h6>
                        </div>
                    </div>
                </div>
                {{-- Pages --}}
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-bar fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">الصفحات</p>
                            <h6 class="mb-0">{{ $pagesCount }}</h6>
                        </div>
                    </div>
                </div>
                {{-- Users --}}
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-area fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">المستخدمين</p>
                            <h6 class="mb-0">{{ $usersCount }}</h6>
                        </div>
                    </div>
                </div>
                {{-- Ads --}}
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">الاعلانات</p>
                            <h6 class="mb-0">{{ $adsCount }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 class="text-center mb-5">ملخصات</h4>
            <div class="row">
                {{-- Pages --}}
                <div class="col">
                    <div class="col-md-12">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">الصفحات</h6>
                                <a href="{{ route('pages') }}">الكل</a>
                            </div>
                            @foreach ($pageMax as $name)
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">
                                                <a href="{{route('edit',"$name")}}">
                                                    {{$name}}
                                                </a>
                                            </h6>
                                            <small>{{$num++}}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- Users --}}
                <div class="col">
                    <div class="col-md-12">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">المستخدمين</h6>
                                <a href="{{ route('users') }}">الكل</a>
                            </div>
                            @foreach ($users as $user)
                                <div class="d-flex align-items-center border-bottom py-3">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">
                                                <a href="{{route('showUser',"$user->id")}}">
                                                    {{$user->name}}
                                                </a>
                                            </h6>
                                            <small>{{$user->email}}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            {{-- Messages --}}
            <div class="col-md-12 mt-5">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">الرسائل</h6>
                        <a href="{{ route('messages') }}">الكل</a>
                    </div>
                    @foreach ($messages as $messages)
                        <div class="d-flex align-items-center border-bottom py-3">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">
                                        <a href="{{route('editAds',"$messages->id")}}">
                                            {{$messages->name}}
                                        </a>
                                    </h6>
                                    <small>{{$messages->subject}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr>
            {{-- Ads --}}
            <div class="col-md-12 mt-5">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">الاعلانات</h6>
                        <a href="{{ route('ads') }}">الكل</a>
                    </div>
                    @foreach ($ads as $ads)
                        <div class="d-flex align-items-center border-bottom py-3">
                            <div class="w-100 ms-3">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-0">
                                        <a href="{{route('editAds',"$ads->id")}}">
                                            {{$ads->title}}
                                        </a>
                                    </h6>
                                    <img src="{{asset("storage/$ads->image")}}" width="150px" height="100px" alt="">
                                    <small>{{$ads->status}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
