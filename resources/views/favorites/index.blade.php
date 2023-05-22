<x-layout>
    <div class="container">
        <div class="d-flex justify-content-center mt-3 mb-3">
            <h1>{{ __('Mis Favoritos') }}</h1>
        </div>

        @if ($user->favorites->isEmpty())
            <p style="height: 70vh" class="text-center">{{ __('No tienes ningún anuncio guardado como favorito') }}.</p>
        @else
            <div class="row">
                @foreach ($user->favorites as $favorite)
                    <div class="col-12 col-md-4">
                        <div class="card darkcard card-2 mb-5">
                            @if ($favorite->ad->images()->count() > 0)
                                <img src="{{ $favorite->ad->images()->first()->getUrl(400,400) }}" class="card-img-top" alt="...">
                            @else
                                <img src="https://via.placeholder.com/400" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $favorite->ad->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $favorite->ad->price }}{{__('€')}}</h6>
                                <p class="card-text">{{ $favorite->ad->body }}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('ads.show', $favorite->ad) }}" class="btn show-btn">{{ __('Mostrar Más') }}</a>
                                    </div>
                                    <form action="{{ route('favorites.remove', $favorite->ad) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn show-btn-delete" data-ad-id="{{ $favorite->ad->id }}">{{ __('Eliminar de favoritos') }}<i class="fa-solid fa-heart-crack ms-1"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
