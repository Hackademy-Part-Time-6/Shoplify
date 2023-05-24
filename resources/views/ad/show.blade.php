<x-layout>
    <div class="container d-none d-lg-block">
        <div class="row my-5 show-card darkcard ">
            <div class="col-12 col-md-6 p-0">
                <div id="adImages" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < $ad->images()->count(); $i++)
                        <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner show-img p-4">
                        @forelse ($ad->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src="{{ $image->getUrl(400, 400) }}" class="d-block w-100 show-img" alt="...">
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="https://via.placeholder.com/400" class="d-block w-100 show-img" alt="...">
                            </div>
                        @endforelse
                    </div>      
                    <button class="carousel-control-prev" type="button" data-bs-target="#adImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#adImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 d-flex row p-4">
                <div class="title"><b> {{__('Título')}}:</b> {{ $ad->title }}</div>
                <div class="price"><b> {{__('Precio')}}:</b> {{ $ad->price }}{{ __('€')}}</div>
                <div class="description"><b> {{__('Descripción')}}:</b> {{ $ad->body }}</div>
                <div><b> {{__('Publicado el')}}:</b> {{ $ad->created_at->format('d/m/Y') }}</div>
                <div class="by"><b> {{__('Por')}}:</b> {{ $ad->user->name }}</div>
                <div>
                    @if (Auth::check())
                    @if (auth()->user()->favorites->contains('ad_id', $ad->id))
                        <form action="{{ route('favorites.remove', $ad) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn show-btn-delete" data-ad-id="{{ $ad->id }}">{{ __('Eliminar de favoritos') }}<i class="fa-solid fa-heart-crack ms-1"></i></button>
                        </form>
                    @else
                        <form action="{{ route('favorites.add', $ad) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn show-btn" data-ad-id="{{ $ad->id }}">{{ __('Guardar como favorito') }}<i class="fa-solid fa-heart ms-1"></i></button>
                        </form>
                    @endif
                @endif
                </div>
                <div>
                @if(Auth::check() && $ad->user_id == Auth::user()->id)
                    <form action="{{ route('ads.destroy', $ad) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn show-btn-delete">{{ __('Eliminar Anuncio') }}<i class="fa-solid fa-trash ms-1"></i></button>
                    </form>
                    <div class="">
                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn mt-2"><i class="fa-solid fa-pencil mt-1 edit-btn"></i></a>
                    </div>
                @endif
                </div>
                <div><a class="badge rounded-pill pill-category" href="{{ route('category.ads',$ad->category) }}">#{{__($ad->category->name )}}</a></div>
                <div class="text-center"><a href="#" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> {{__('Contactar a')}} {{ $ad->user->name }}</a></div>
            </div>
        </div>
    </div>
    <div class="container d-sm-none">
        <div class="row my-5 show-card darkcard m-2">
            <div class="col-12 col-md-6 p-0">
                <div id="adImages" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < $ad->images()->count(); $i++)
                        <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif" aria-current="true" aria-label="Slide {{$i + 1}}"></button>
                        @endfor
                    </div>
                    <div class="carousel-inner show-img p-4">
                        @forelse ($ad->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src="{{ $image->getUrl(400, 400) }}" class="d-block w-100 show-img" alt="...">
                            </div>
                        @empty
                            <div class="carousel-item active">
                                <img src="https://via.placeholder.com/400" class="d-block w-100 show-img" alt="...">
                            </div>
                        @endforelse
                    </div>      
                    <button class="carousel-control-prev" type="button" data-bs-target="#adImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#adImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 d-flex row p-4">
                <div class="title m-2"><b> {{__('Título')}}:</b> {{ $ad->title }}</div>
                <div class="price m-2"><b> {{__('Precio')}}:</b> {{ $ad->price }}{{ __('€')}}</div>
                <div class="description m-2"><b> {{__('Descripción')}}:</b> {{ $ad->body }}</div>
                <div class="m-2"><b> {{__('Publicado el')}}:</b> {{ $ad->created_at->format('d/m/Y') }}</div>
                <div class="by m-2"><b> {{__('Por')}}:</b> {{ $ad->user->name }}</div>
                <div>
                    @if (Auth::check())
                    @if (auth()->user()->favorites->contains('ad_id', $ad->id))
                        <form action="{{ route('favorites.remove', $ad) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn show-btn-delete" data-ad-id="{{ $ad->id }}">{{ __('Eliminar de favoritos') }}<i class="fa-solid fa-heart-crack ms-1"></i></button>
                        </form>
                    @else
                        <form action="{{ route('favorites.add', $ad) }}" method="POST" class="d-inline ms-1">
                            @csrf
                            <button type="submit" class="btn show-btn" data-ad-id="{{ $ad->id }}">{{ __('Guardar como favorito') }}<i class="fa-solid fa-heart ms-1"></i></button>
                        </form>
                    @endif
                @endif
                </div>
                <div>
                @if(Auth::check() && $ad->user_id == Auth::user()->id)
                    <form action="{{ route('ads.destroy', $ad) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn show-btn-delete m-2">{{ __('Eliminar Anuncio') }}<i class="fa-solid fa-trash ms-1"></i></button>
                    </form>
                    <div class="">
                        <a href="{{ route('ads.edit', $ad->id) }}" class="btn mt-2"><i class="fa-solid fa-pencil" style="font-size: 5vh"></i></a>
                    </div>
                @endif
                </div>
                <div><a class="badge rounded-pill pill-category m-2" href="{{ route('category.ads',$ad->category) }}">#{{__($ad->category->name )}}</a></div>
                <div><a href="#" class="btn btn-success m-2"><i class="fa-brands fa-whatsapp"></i> {{__('Contactar a')}} {{ $ad->user->name }}</a></div>
            </div>
        </div>
    </div>
</x-layout>