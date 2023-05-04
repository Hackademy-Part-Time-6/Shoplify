<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @livewireStyles
    @vite(['resources/css/app.css'], ['resources/js/app.js'])
</head>
<body>

    <x-nav />


    <div class="col-12 d-flex justify-content-center mt-5">
        <h1>{{__('messages.welcome')}}</h1>
    </div>

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

    @livewireScripts
    {{$script ?? ''}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/98b4e4a212.js" crossorigin="anonymous"></script>
</body>
</html>