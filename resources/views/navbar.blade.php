<style>
    #landing-nav {
        display: flex;
        flex-direction: row;
    }

    #landing-nav a:hover {
        text-decoration: underline;
    }

    @media only screen and (max-width: 767px) {
        #landing-nav {
            display: none;
        }

        #landing-nav-mobile {
            display: block !important;
        }
    }
</style>

<nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">
        {{-- Left --}}
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav me-auto">
                @auth
                    <a class="navbar-brand fw-bold" href="/home"><span class="text-warning">Cine</span><span>Mov.</span></a>
                @else
                    <a class="navbar-brand fw-bold" href="/"><span class="text-warning">Cine</span><span>Mov.</span></a>
                @endauth
            </ul>
        </div>

        {{-- Center --}}
        <div>
            @if (request()->is('/'))
                <div id="landing-nav">
                    <a class="nav-link text-light mx-3" href="#home">Home</a>
                    <a class="nav-link text-light mx-3" href="#features">Features</a>
                    <a class="nav-link text-light mx-3" href="#movies">Movies</a>
                </div>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        {{-- Right --}}
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ms-auto">
                @auth
                    @yield('searchbar')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-light">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <div id="landing-nav-mobile" style="display:none">
                        <li class="nav-item">
                            <a href="#home" class="nav-link">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#features" class="nav-link">
                                Features
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#movies" class="nav-link">
                                Movies
                            </a>
                        </li>
                    </div>
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ request()->is('login') ? 'active' : '' }}">
                            Sign In
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link {{ request()->is('register') ? 'active' : '' }}">
                            Sign Up
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>

</nav>
