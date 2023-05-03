<x-layout>
    <x-slot name="title">Shoplify - {{ $category->name }} ads</x-slot>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>{{__('Anuncios por categoría')}}: {{__($category->name)}}</h1>
            </div>
        </div>
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-12 col-md-4">
                    <div class="card mb-5">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title"> {{ $ad->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }}</h6>
                            <p class="card-text"> {{ $ad->body }}</p>
                            <div class="card-subtitle mb-2">
                                <strong><a href="{{ route('category.ads',$ad->category) }}">#{{ $category->name}}</a></strong>
                                    <i>{{ $ad->created_at->format('d/m/y')}}</i>
                            </div>
                            <div class="card-subtitle mb-2">
                                <small>{{ $ad->user->name }}</small>
                            </div>
                            <a href="{{ route("ads.show", $ad) }}" class="btn btn-primary">{{__('Mostrar Más')}}</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <h2>{{__('Uyy.. parece que no hay nada')}}</h2>
                    <a href="{{ route('ads.create')}}" class="btn btn-success">{{__('Vende tu primer objeto')}}</a>
                    {{__('o')}} <a href="{{ route('home')}}" class="btn btn-primary">{{__('Vuelve a la página inicial')}}</a>
                </div>
                @endforelse
            </div>
        </div>
        {{$ads->links()}}
</x-layout>