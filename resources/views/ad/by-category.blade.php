<x-layout>
    <x-slot name="title">Shoplify - {{ $category->name }} ads</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-4">
                <h1>{{__('Anuncios por categoría')}}: {{__($category->name)}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="mt-3 mb-3">
                <form action="{{ route('search')}}" method="GET" class="d-flex" role="search">
                    <input class="form-control search me-2 p-2 ps-3" type="search" placeholder="{{ __('¿Que necesitas?')}}" aria-label="Search" name="q">
                    <button class="btn lupa" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <div class="row">
            @forelse($ads as $ad)
            <div class="col-12 col-md-4">
                <div class="card darkcard card-2 mb-5">
                    @if ($ad->images()->count() > 0)
                        <div style="position: relative;">
                            @if (Auth::check())
                                @if (auth()->user()->favorites->contains('ad_id', $ad->id))
                                    <img src="{{ $ad->images()->first()->getUrl(400, 400) }}" class="card-img-top" alt="...">
                                    <form action="{{ route('favorites.remove', $ad) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn fa-solid fa-heart welcome-fav" data-ad-id="{{ $ad->id }}" style="position: absolute; top: 10px; right: 10px;"></button>
                                    </form>
                                @else
                                    <img src="{{ $ad->images()->first()->getUrl(400, 400) }}" class="card-img-top" alt="...">
                                    <form action="{{ route('favorites.add', $ad) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn fa-regular fa-heart welcome-fav" data-ad-id="{{ $ad->id }}" style="position: absolute; top: 10px; right: 10px;"></button>
                                    </form>
                                @endif
                            @else
                                <img src="{{ $ad->images()->first()->getUrl(400, 400) }}" class="card-img-top" alt="...">
                                
                            @endif
                        </div>
                    @else
                        <div style="position: relative;">
                            @if (Auth::check())
                                @if (auth()->user()->favorites->contains('ad_id', $ad->id))
                                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="...">
                                    <form action="{{ route('favorites.remove', $ad) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn fa-solid fa-heart welcome-fav" data-ad-id="{{ $ad->id }}" style="position: absolute; top: 10px; right: 10px;"></button>
                                    </form>
                                @else
                                    <img src="https://via.placeholder.com/400" class="card-img-top" alt="...">
                                    <form action="{{ route('favorites.add', $ad) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn fa-regular fa-heart welcome-fav" data-ad-id="{{ $ad->id }}" style="position: absolute; top: 10px; right: 10px;"></button>
                                    </form>
                                @endif
                            @else
                                <img src="https://via.placeholder.com/400" class="card-img-top" alt="...">
                                
                            @endif
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}{{ __('€')}}</h6>
                        <p class="card-text">{{ $ad->body }}</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route("ads.show", $ad) }}" class="btn show-btn">{{__('Mostrar Más')}}</a>
                        </div>
                    </div>
                </div>
            </div>
                @empty
                <div class="col-12 text-center" style="height: 55vh">
                    <h2 class="mb-4">{{__('Uyy.. parece que no hay nada')}}</h2>
                    <a href="{{ route('ads.create')}}" class="btn btn-success" style="background-color: rgb(74, 180, 74);" >{{__('Vende tu primer objeto')}}</a>
                    {{__('o')}} 
                    <a href="{{ route('home')}}" class="btn btn-primary" style="background-color: #007bff;">{{__('Vuelve a la página inicial')}}</a>
                </div>
                @endforelse
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{$ads->links()}}
        </div>  
</x-layout>