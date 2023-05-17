<x-layout>
    <x-slot name="title">Shoplify -  ads</x-slot>
    <div class="mb-2 mt-3 ms-5" style="width:80vh">
        <form action="{{ route('search')}}" method="GET" class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="¿Que necesitas?" aria-label="Search" name="q">
            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
        </form>
    </div>
    <div>
        @if($ads->count())
        <ul>
            @foreach($ads as $ad)
            <div class="col-12 col-md-6 d-flex row p-4">
                    <div class="card-img-top">
                        <img src="{{$ad->images()->first()->getUrl(400,400)}}" class="" alt="...">
                    </div>
                    <div class="title"><b>{{__('Título')}}:</b> {{ $ad->title }}</div>
                    <div class="price"><b>{{__('Precio')}}:</b> {{ $ad->price }}{{ __('€')}}</div>
                    <div class="description"><b>{{__('Descripción')}}:</b> {{ $ad->body }}</div>
                    <div><b>{{__('Publicado el')}}:</b> {{ $ad->created_at->format('d/m/Y') }}</div>
                    <div class="by"><b>{{__('Por')}}:</b> {{ $ad->user->name }}</div>
                    <div><a class="badge rounded-pill pill-category" href="{{ route('category.ads',$ad->category) }}">#{{__($ad->category->name )}}</a></div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route("ads.show", $ad) }}" class="btn btn-primary">{{__('Mostrar Más')}}</a>
                    </div>
                    <div class="text-center"><a href="#" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> {{__('Contactar a')}} {{ $ad->user->name }}</a></div>
                </div>
            </div>
        @endforeach
        </ul>
    @else
        <p>No se encontraron anuncios.</p>
    @endif
    </div>
</x-layout>