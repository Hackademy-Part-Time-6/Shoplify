<x-layout>
    <x-slot name="title">Shoplify -  ads</x-slot>
    
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <div class="col-12 d-flex justify-content-center mt-5">
                        <h1>{{__('messages.welcome')}}</h1>
                    </div>
                    <h1 class="welcome">{{__('Bienvenido a Shoplify.es')}}</h1>
                </div>
            </div>
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="card mb-5">
                        @if ($ad->images()->count() > 0)
                            <img src="{{$ad->images()->first()->getUrl(400,300)}}" class="card-img-top" alt="...">
                                @else
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                                @endif
                        <div class="card-body">
                            <h5 class="card-title"> {{ $ad->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}{{ __('€')}}</h6>
                            <p class="card-text"> {{ $ad->body }}</p>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route("ads.show", $ad) }}" class="btn btn-primary">{{__('Mostrar Más')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 d-flex justify-content-center" style="margin-top:20vh; margin-bottom:20vh">
                    <div>
                        <h2 class="mb-4">{{__('Uyy.. parece que no hay nada')}}</h2>
                        <a href="{{ route('ads.create')}}" class="btn btn-success" style="background-color: rgb(74, 180, 74);">{{__('Vende tu primer objeto')}}</a>
                        {{__('o')}} 
                        <a href="{{ route('home')}}" class="btn btn-primary" style="background-color: #007bff;">{{__('Vuelve a la página inicial')}}</a>
                    </div>
                    
                </div>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{$ads->links()}}
        </div>     
</x-layout>