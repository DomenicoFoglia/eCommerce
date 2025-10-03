<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <p>{{ App::getLocale() }}</p>
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('homepage') }}">{{ __('ui.navbar.home') }}</a>

        <!-- Barra di ricerca -->
        <form class="d-flex mx-auto my-2 my-lg-0 w-50 w-lg-25" role="search">
            <input class="form-control me-2" type="search" placeholder="{{ __('ui.navbar.placeholderSearch') }}"
                aria-label="Search">
            <button class="btn btn-outline-success" type="submit">{{ __('ui.navbar.search') }}</button>
        </form>

        <!-- Bottone hamburger -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="{{ __('ui.navbar.toggleNavigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapse per link e dropdown -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Link a sinistra -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active"
                        href="{{ route('homepage') }}">{{ __('ui.navbar.home') }}</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ route('article.index') }}">{{ __('ui.navbar.allArticles') }}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.navbar.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', ['category' => $category]) }}">
                                    {{ __('ui.categories.' . $category->name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <!-- Lingue -->
                <li class="mx-2"><x-_locale lang="it" /></li>
                <li class="mx-2"><x-_locale lang="en" /></li>
                <li class="mx-2"><x-_locale lang="es" /></li>
            </ul>

            <!-- Dropdown a destra -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @auth
                            {{ __('ui.navbar.hello', ['name' => Auth::user()->name]) }}
                            @if (Auth::user()->is_revisor && \App\Models\Article::toBeRevisedCount() > 0)
                                <span class="position-absolute translate-middle badge rounded-pill bg-danger">!</span>
                            @endif
                        @else
                            {{ __('ui.navbar.login') }}
                        @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.navbar.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.navbar.register') }}</a>
                            </li>
                        @else
                            @auth
                                @if (Auth::user()->is_revisor)
                                    <li>
                                        <a href="{{ route('revisor.index') }}" class="dropdown-item position-relative">
                                            {{ __('ui.navbar.revisorArea') }}
                                            @if (\App\Models\Article::toBeRevisedCount() > 0)
                                                <span class="position-absolute badge mx-1 rounded-pill bg-danger">
                                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                                </span>
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endauth
                            <li><a class="dropdown-item"
                                    href="{{ route('create.article') }}">{{ __('ui.navbar.createListing') }}</a></li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">
                                    {{ __('ui.navbar.logout') }}
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
