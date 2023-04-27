<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
              <a class="nav-link" href="{{ route('login') }}"><span>Iniciar Sesión</span></a>
            </li>
            @endif
            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}"><span>Registrarse</span></a>
            </li>
            @endif
          @else
            <li class="nav-item">
              <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
              </form>
              <button href="{{ route ('ads.create') }}">Insercion Anuncio</button>
              <a id="logoutBtn" class="nav-link" href="#">Salir</a>
            </li>
          @endguest
        </div>
      </div>
    </div>
  </nav>