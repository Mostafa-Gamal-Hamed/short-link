<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user() && Auth::user()->role == 'user')
                        <h1 class="text-lg font-black text-center text-xl mb-4">اكوادك</h1>

                        <div class="container">
                            {{-- Links --}}
                            <div class="d-flex justify-center align-items-center mb-4">
                                <button class="btn btn-primary mx-2 px-5" id="urlB">URL</button>
                                <button class="btn btn-info mx-2 px-5" id="qrB">QR</button>
                            </div>
                            {{-- Url --}}
                            <table class="table table-striped text-center mb-5" style="display: none;" id="url">
                                <thead>
                                    <tr>
                                        <th>العدد</th>
                                        <th>الرابط المختصر</th>
                                        <th>الرابط</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($url as $url)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $url->short_url }}</td>
                                            <td>{{ $url->original_url }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Qr --}}
                            <table class="table table-striped text-center" style="display: none;" id="qr">
                                <thead>
                                    <tr>
                                        <th>العدد</th>
                                        <th>رمز الاستجابة Qr</th>
                                        <th>الرابط</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Qr as $qr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $qr->original_url }}
                                            </td>
                                            <td>
                                                {!! $qr->qr !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h2>Admin</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Display for contact
            $("#urlB").click(function() {
                $("#url").toggle();
                $("#qr").hide();
            });
            $("#qrB").click(function() {
                $("#qr").toggle();
                $("#url").hide();
            });
        });
    </script>
</x-app-layout>
