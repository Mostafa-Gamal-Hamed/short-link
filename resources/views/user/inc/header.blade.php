<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="@yield('key')">
    <meta name="description" content="@yield('desc')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{App\Models\Admin\WebsiteName::latest('id')->first()->name;}}</title>
    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/s.css')}}">
    {{-- Google analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-B8Q5WTVQZ7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-B8Q5WTVQZ7');
    </script>

</head>
<body>
