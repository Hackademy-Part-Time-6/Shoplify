<x-layout>
    <x-slot name='title'>Shoplify - {{__('Inicio')}} {{__('Revisor')}}</x-slot>
    @if($ad)
    <div class='container my-5 py-5'>
        <div class='row'>
            <div class='col-12 col-md-8 offset-md-2'>
                <div class="card darkcard">
                    <div class="card-header">
                        {{__('Anuncio')}} #{{$ad->id}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <b>{{__('Imágenes')}}:</b>
                            </div>
                            <div class="col-12">
                                @forelse ($ad->images as $image)
                                <div class="row m-2" style="border-bottom: 1px solid #aeb1b3">
                                    <div class="col-md-4">
                                        <img src="{{$image->getUrl(400,400)}}" class="img-fluid m-2" alt="...">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7 d-flex align-items-center" style="list-style: none; font-size: 2vh">
                                        <div>
                                            <li class="m-3">{{__('Adulto')}} : <i class="bi bi-circle-fill {{ $image->adult}}"></i></li>
                                            <li class="m-3">{{__('Meme')}} : <i class="bi bi-circle-fill {{ $image->spoof}}"></i></li>
                                            <li class="m-3">{{__('Salud')}} : <i class="bi bi-circle-fill {{ $image->medical}}"></i></li>
                                            <li class="m-3">{{__('Violento')}} : <i class="bi bi-circle-fill {{ $image->violence}}"></i></li>
                                            <li class="m-3">{{__('Excitante')}} : <i class="bi bi-circle-fill {{ $image->racy}}"></i></li>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div>
                                            <h3>{{ __('Etiquetas')}}</h3>
                                            @forelse ($image->getLabels() as $label) 
                                            <a href="#" class="badge rounded-pill pill-category m-1">#{{$label}}</a>
                                            @empty
                                            {{ __('Sin etiquetas')}}
                                            @endforelse
                                        </div>
                                        <div class="mt-2">
                                            <p>Id: <b>{{ $image->id}}</b></p>
                                            <p>Url: <b>{{ Storage:: url($image->path)}}</b></p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12">
                                    <b>{{__('No hay imágenes')}}</b>
                                </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="m-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('Usuario')}}:</b>
                                </div>
                                <div class="col-md-9">
                                    #{{$ad->user->id}} - {{$ad->user->name}} - {{$ad->user->email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('Título')}}:</b>
                                </div>
                                <div class="col-md-9">
                                    {{$ad->title}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('Precio')}}:</b>
                                </div>
                                <div class="col-md-9">
                                    {{$ad->price}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('Descripción')}}:</b>
                                </div>
                                <div class="col-md-9">
                                    {{$ad->body}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('Categoría')}}:</b>
                                </div>
                                <div class="col-md-9">
                                    {{$ad->category->name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <b>{{__('Publicado el')}}:</b>
                                </div>
                                <div class="col-md-9">
                                    {{$ad->created_at}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    @if($ad->user_id !== auth()->user()->id)
                    <div class="col-6 text-end">
                        <form action="{{route('revisor.ad.reject',$ad)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger">{{__('Rechazar')}}</button>
                        </form>
                    </div>
                    <div class="col-6 text-start">
                        <form action="{{route('revisor.ad.accept',$ad)}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">{{__('Aceptar')}}</button>
                        </form>
                    </div>
                    @else
                    <div class="col-12 text-center">
                        <p>{{__('Este anuncio fue creado por ti')}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
    <h3 class="text-center mt-5" style="height: 65vh">{{__('No hay anuncios para revisar, vuelve más tarde, gracias')}}</h3> 
    @endif
</x-layout>