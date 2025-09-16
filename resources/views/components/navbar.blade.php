<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('homepage') }}">Navbar</a>

        <!-- Barra di ricerca -->
        <form class="d-flex mx-auto my-2 my-lg-0 w-100 w-lg-50" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <!-- Bottone hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse per link e dropdown -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Link a sinistra -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="{{ route('homepage') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
            </ul>

            <!-- Dropdown a destra -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            Ciao {{ Auth::user()->name }}!
                        @else
                            Ciao, accedi!
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('create.article') }}">Crea un articolo</a></li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                    Logout
                                </a>
                            </li>
                            <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
