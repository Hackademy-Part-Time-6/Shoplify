<x-layout>
    <div class="container">
        <h1>Mis Anuncios</h1>

        @if ($ads->isEmpty())
            <p>No tienes ningún anuncio publicado.</p>
        @else
            <div class="row">
                @foreach ($ads as $ad)
                    <div class="col-12 col-md-4">
                        <div class="card darkcard card-2 mb-5">
                            @if ($ad->images()->count() > 0)
                                <img src="{{$ad->images()->first()->getUrl(400,400)}}" class="card-img-top" alt="...">
                            @else
                                <img src="https://via.placeholder.com/400" class="card-img-top" alt="...">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title"> {{ $ad->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}{{ __('€')}}</h6>
                                <p class="card-text"> {{ $ad->body }}</p>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route("ads.show", $ad) }}" class="btn show-btn">{{__('Mostrar Más')}}</a>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('ads.destroy', $ad) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('Eliminar Anuncio')}}</button>
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
