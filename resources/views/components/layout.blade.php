<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @livewireStyles
    @vite(['resources/css/app.css'])
</head>
<body>

    <x-nav />


    

    @if (session()->has('message'))
        <x-alert :type="session('message')['type']" :message="session('message')['text']" />
    @endif

    @if (session()->has('createAd'))
        <x-alert :type="session('createAd')['type']" :message="session('createAd')['text']"/>
    @endif
    
    <div>
        {{$slot}}
    </div>   

    <div>
    <x-footer />
    </div>

    @vite(['resources/js/app.js'])
    @livewireScripts
    
    {{$script ?? ''}}
    <script src="https://kit.fontawesome.com/98b4e4a212.js" crossorigin="anonymous"></script>
</body>
</html>