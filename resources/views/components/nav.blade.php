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
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li>
          </ul>
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
                  <a class="nav-link item_nav" href="{{route('login')}}"> {{('Iniciar sesión')}}
                  </a>
              </li>
              @endif

              @if (Route::has('register'))

              @endif

              @else
              <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle item_nav mx-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if (Auth::user()->is_revisor)
              <li>
                <a class="dropdown-item" href="{{ route('revisor.home') }}">
                  Revisor
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
                <a id="logoutBtn" class="dropdown-item" href="#">{{('Salir')}}</a>
              </li>
            </ul>
          </li>
             @endguest
        </div>
      </div>
    </div>
  </nav>