<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand logo mx-2" href="{{ route('home') }}">Shoplify</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item mx-2">
            <a class="nav-link item_nav" aria-current="page" href="{{ route('home') }}">{{__('Inicio')}}</a>
          </li>  
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li>
          </ul>
        </li>
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle item_nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('Categorías')}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category )
                  <li>
                    <a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{__($category->name)}}</a>
                  </li>
                @endforeach
          </li>
            </ul>
        </ul>
        <div class="d-flex px-2 list-unstyled">
          @guest
              @if (Route::has('login'))
              <li class="nav-item">
                <a class="nav-link item_nav" href="{{route('login')}}"> {{__('Iniciar Sesion')}}</a>
              </li>
              @endif
              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link item_nav ms-2" href="{{route('register')}}"><span>{{__('Registrar')}}</span></a>
                </li>
              @endif

              @else

              <li class="nav-item item-nav">
                <a class="nav-link btn btn-info" href="{{ route('ads.create') }}">
                  {{__('Nuevo Anuncio')}}
                </a>
              </li>
              <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle item_nav mx-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if (Auth::user()->is_revisor)
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
        </div>


        <li class="nav-item">
          <x-locale lang="es" country="es" />
        </li>
        
        <li class="nav-item">
          <x-locale lang="en" country="gb" />
        </li>
        
        <li class="nav-item">
          <x-locale lang="it" country="it" />
        </li>
      </div>
    </div>
</nav>