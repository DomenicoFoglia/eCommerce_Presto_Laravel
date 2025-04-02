<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page"
                        href="{{ route('article.index') }}">{{ __('ui.navbar.allArticles') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ __('ui.navbar.categories') }}</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', ['category' => $category]) }}">{{ __('ui.' . $category->name) }}</a>
                            </li>
                            @if (!$loop->last)
                                <hr class="dropdown-divider">
                            @endif
                        @endforeach
                    </ul>
                </li>
                @auth
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item mx-3">
                            <a href="{{ route('revisor.index') }}"
                                class="nav-link btn btn-outline-success btn-sm position-relative w-sm-25">{{ __('ui.navbar.revisorArea') }}
                                <span
                                    class="position-absolute top-0 start-100 transalte-middle badge rounded-pill bg-danger">{{ \App\Models\Article::toBeRevisedCount() }}</span></a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.navbar.hello', ['name' => Auth::user()->name]) }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" aria-current="page"
                                    href="{{ route('article.create') }}">{{ __('ui.navbar.createListing') }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">{{ __('ui.navbar.logout') }}</a>
                                <form id="form-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">{{ __('ui.navbar.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.navbar.register') }}</a>
                            </li>
                        </ul>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.navbar.language') }}
                    </a>
                    <ul class="dropdown-menu">
                        <x-_locale lang="it" />
                        <x-_locale lang="en" />
                        {{-- <x-_locale lang="es" /> --}}
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('article.search') }}" method="GET">
                <div class="input-group">
                    <input class="form-control me-2" type="search" name="query"
                        placeholder="{{ __('ui.navbar.placeholderSearch') }}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"
                        id="basic-addon2">{{ __('ui.navbar.search') }}</button>
                </div>
            </form>
        </div>
    </div>
</nav>
