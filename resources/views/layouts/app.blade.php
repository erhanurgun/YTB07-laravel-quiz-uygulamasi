<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $header }} | {{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="https://urgun.com.tr/assets/_img/favicon.svg" type="image/x-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-jet-banner/>

<div class="min-h-screen bg-gray-100">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($errors->any())
                <div class="bg-red-200 text-red-800 p-5 rounded mb-3">
                    <h4 class="font-bold text-xl"><i class="fa fa-bullhorn"></i> UYARI !!!</h4>
                    <ul class="space-y-1 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div id="successMssg" class="bg-green-200 text-green-800 p-5 rounded mb-3">
                    <h4 class="font-bold text-xl"><i class="fa fa-info-circle"></i> TEBRİKLER</h4>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            {{ $slot }}
        </div>
    </div>

    @stack('modals')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    @isset($js)
        {{ $js }}
    @endif

    <script>
        setTimeout(function () {
            $('#successMssg').hide()
        }, 4000);
    </script>
    @livewireScripts
</body>
</html>
