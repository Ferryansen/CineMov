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
                            <li>
                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#profileModal">
                                    Profile
                                </button>
                            </li>

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

<!-- Profile Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profileModalLabel">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" disabled
                            value="{{ auth()->check() ? auth()->user()->name : '' }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" disabled
                            value="{{ auth()->check() ? auth()->user()->email : '' }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Profile Modal -->
