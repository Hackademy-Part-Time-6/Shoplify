<x-layout>
    <div class="container">
        <div class="row my-5 show-card">
            <div class="col-12 col-md-6 p-0">
                <div id="adImages" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button"  data-bs-target="#adImages"  data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button"  data-bs-target="#adImages"  data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button"  data-bs-target="#adImages"  data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner show-img p-4">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/700/600?a" class="d-block w-100 show-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/700/600?a" class="d-block w-100 show-img" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/700/600?a" class="d-block w-100 show-img" alt="...">
                        </div>
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
                <div><b> {{__('Publicado el')}}:</b> {{ $ad->created_at->format('d/m/Y') }}></div>
                <div class="by"><b> {{__('Por')}}:</b> {{ $ad->user->name }}</div>
                <div><a class="badge rounded-pill pill-category" href="{{ route('category.ads',$ad->category) }}">#{{__($ad->category->name )}}</a></div>
                <div class="text-center"><a href="#" class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> {{__('Contactar a')}} {{ $ad->user->name }}</a></div>
            </div>
        </div>
    </div>
</x-layout>