@extends('user.layout')

@section('desc')
View your QR Code here. You can easily create more QR codes.
@endsection

@section('key')
QR Code Result, QR Code Display, QR Code Generated
@endsection

@section('title')
    QR Code Result
@endsection

@section('body')
    <div class="container text-center" style="margin: 100px auto 100px auto;">
        <h2>Your Qr Code</h2>
        <div>
            {!! $qrCode !!}
        </div>
        <a href="{{ url('codeQr') }}" class="mt-3">Generate Another QR Code</a>
    </div>
@endsection
