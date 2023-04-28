<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand logo mx-2" href="{{ route('home') }}">Shoplify</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item mx-2">
            <a class="nav-link item_nav" aria-current="page" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link item_nav" href="#">Link</a>
          </li>
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle item_nav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category )
                  <li>
                    <a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{ $category->name }}</a>
                  </li>
                @endforeach
          </li>
            </ul>
        </ul>
        <div class="d-flex px-2 list-unstyled">
          @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link btn" href="{{ route('login') }}"><span>Iniciar Sesión</span></a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link btn" href="{{ route('register') }}"><span>Registrarse</span></a>
            </li>
            @endif
          @else
            <li class="nav-item">
             <div class="d-flex justify-content-around">
              <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
              </form>
              <a class="mx-2 btn" href="{{ route('ads.create') }}">Insercion Anuncio</a>
              <a class="mx-2 btn" id="logoutBtn" class="nav-link" href="{{ route('logout') }}">Salir</a>
             </div>
            </li>
          @endguest
        </div>
      </div>
    </div>
  </nav>