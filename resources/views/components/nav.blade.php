<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid m-2">
    <a class="navbar-brand logo mx-3" href="{{ route('home') }}">Shoplify</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">  
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle item_nav mt-1" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{__('Categorías')}}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category )
              <li>
                <a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{__($category->name)}}</a>
              </li>
            @endforeach
          </ul>
        </li>      
      </ul>
      <div class="d-flex px-2 list-unstyled" style="color: azure">
        @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link item_nav ms-2 me-2" href="{{route('login')}}"> {{__('Iniciar Sesion')}}</a>
            </li>
            @endif
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="nav-link item_nav ms-2 me-2" href="{{route('register')}}">{{__('Registrar')}}</a>
              </li>
            @endif

            @else
            <li class="nav-item item-nav d-lg-inline-flex">
              <a class="nav-link btn btn-warning" href="{{ route('ads.create') }}">
                <i class="fa-regular fa-plus"></i> {{__('Nuevo Anuncio')}}
              </a>
            </li>            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle item_nav mx-3 d-none d-sm-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </a>
              <a class="nav-link item_nav d-sm-none dropdown-item" data-bs-toggle="dropdown">
                <i class="fa-solid fa-user ms-3 me-3 mt-1" style="font-size: 5vh"></i>
              </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if (Auth::user()->is_revisor)
            <a class="nav-link item_nav d-sm-none dropdown-item" href="#">
            </a>
            <li>
              <a class="dropdown-item" href="{{ route('revisor.home') }}">
                {{__('Revisor')}}
                <span class="badge rounded-pill bg-danger">
                  {{\App\Models\Ad::ToBeRevisionedCount()}}
                </span>
              </a>
            </li>
            @endif
            <li>
              <form id="logoutForm" action="{{route('logout')}}" method="POST">
                @csrf
              </form>
              <a id="logoutBtn" class="dropdown-item" href="#">{{__('Salir')}}</a>
            </li>
          </ul>
        </li>
        @endguest

        <li class="nav-item dropdown mx-2 me-5 d-flex align-items-center">
          <a class="nav-link dropdown-toggle item_nav d-none d-lg-block" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-earth-americas"></i> {{__('Idiomas')}}
          </a>
          
          <a class="nav-link dropdown item_nav d-sm-none" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-earth-americas mt-1" style="font-size: 5vh"></i>
          </a>
          
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="d-flex justify-content-around">
              <li class="nav-item dropdown-item">
                <x-locale lang="es" country="es" />
              </li>
        
              <li class="nav-item dropdown-item">
                <x-locale lang="en" country="gb" />
              </li>
        
              <li class="nav-item dropdown-item">
                <x-locale lang="it" country="it" />
              </li>
            </div>
          </ul>
          
          <ul class="dropdown-menu d-sm-none" aria-labelledby="navbarDropdown">
            <div>
              <li class="nav-item dropdown-item">
                <x-locale lang="es" country="es" />
              </li>
        
              <li class="nav-item dropdown-item">
                <x-locale lang="en" country="gb" />
              </li>
        
              <li class="nav-item dropdown-item">
                <x-locale lang="it" country="it" />
              </li>
            </div>
          </ul>
        </li>
    </div>
    </div>
  </div>
</nav>