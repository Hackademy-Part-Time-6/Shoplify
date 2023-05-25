<x-layout>
    <div class="container">
        <div class="d-flex justify-content-center mt-3">
            <h2>{{__('Resultado de la búsqueda')}}:</h2>
        </div>
        <div class="mb-3 mt-3">
            <form action="{{ route('search')}}" method="GET" class="d-flex" role="search">
                <input class="form-control search me-2 p-2" type="search" placeholder="{{__('¿Que necesitas?')}}" aria-label="Search" name="q">
                <button class="btn lupa" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="card darkcard card-2 mb-5">
                        @if ($ad->images()->count() > 0)
                            <img src="{{$ad->images()->first()->getUrl(400,400)}}" class="card-img-top" alt="...">
                        @else
                            <img src="https://via.placeholder.com/400" class="card-img-top" alt="...">
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
                <div class="col-12">
                    <p class="text-center mt-5" style="height: 50vh">{{__('Lo sentimos, no tenemos lo que estás buscando')}}</p>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $ads->onEachSide(3)->links('pagination::bootstrap-4', ['lang' => 'es']) }}
    </div>
</x-layout>