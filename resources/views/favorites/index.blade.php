<x-layout>
    <div class="container">
        <h1>Mis Favoritos</h1>

        @if ($user->favorites->isEmpty())
            <p style="height: 70vh">No tienes ningún anuncio guardado como favorito.</p>
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
                                <h6 class="card-subtitle mb-2 text-muted">{{ $favorite->ad->price }}{{ __('€') }}</h6>
                                <p class="card-text">{{ $favorite->ad->body }}</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('ads.show', $favorite->ad) }}" class="btn show-btn">{{ __('Mostrar Más') }}</a>
                                </div>
                                <form action="{{ route('favorites.remove', $favorite->ad) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-ad-id="{{ $favorite->ad->id }}">{{ __('Eliminar de favoritos') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
