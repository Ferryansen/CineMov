<style>
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%
    }

    #home {
        height: 90vh;
    }

    #movies {
        height: 110vh;
    }

    #features {
        height: 100vh;
    }

    #home {
        display: flex;
        flex-direction: row;
        justify-content: start;
        align-items: center;
    }

    @media only screen and (max-width: 990px) {
        #home {
            justify-content: center;
            align-items: center;
        }

        #home .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            text-align: center;
        }

        body {
            background-size: cover !important;
        }
    }

    #home .content {
        width: 50%;
    }

    #features {
        background-image: none;
        background: linear-gradient(179.78deg, #17120F 25.79%, #44312B 83.31%);
        backdrop-filter: blur(2px);
    }

    #movies {
        background-image: none;
        background: linear-gradient(179.78deg, #44312B 25.79%, #17120F 83.31%);
        backdrop-filter: blur(2px);
    }

    #footer-container {
        background: #17120F;
        backdrop-filter: blur(2px);
        width: 100%;
    }

    @media only screen and (max-width: 990px) {
        #feature-cards {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        #features {
            height: max-content;
        }

        .card {
            margin-top: 24px;
        }
    }

    .card {
        border-radius: 2em !important;
        text-align: center;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
    }

    .card img {
        border-radius: 2em !important;
    }

    .card:hover {
        box-shadow: 1px 8px 20px rgba(255, 255, 255, 0.466);
        -webkit-transition: box-shadow .2s ease-in-out;
        cursor: pointer;
    }

    .carousel-indicators {
        height: 10px;
    }

    .carousel-indicators>button {
        position: relative;
        top: 40px;
        height: 10px !important;
        width: 10px !important;
        border-radius: 100vmax !important;
    }
</style>

@extends('layout')

@section('content')
    {{-- Home Section --}}
    <div id="home" class="container">
        <div class="content">
            <h1 class="text-white fw-bold">Browse movies, see what people say, and give your opinions !</h1>
            <div class="mt-5">
                <a href="/register" class="btn btn-warning">Sign up</a>
                <a href="/login" class="btn btn-outline-warning">Sign in</a>
            </div>
        </div>
    </div>
    {{-- Home Section --}}

    {{-- Features Section --}}
    <div id="features">
        <div class="content container pt-5">
            <h2 class="text-light text-center fw-bold">FEATURES</h2>

            <div id="feature-cards" class="d-flex justify-content-evenly align-items-center mt-5">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/images/discover-movies.png') }}" style="height: 250px;" class="card-img-top"
                        alt="image">
                    <div class="card-body">
                        <h4 class="card-text fw-bold">Discover movies</h4>
                        <p>Discover latest and popular movie details, including movie cover, synopsis, genre, and trailer.
                        </p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/images/see-comments.png') }}" style="height: 250px;" class="card-img-top"
                        alt="image">
                    <div class="card-body">
                        <h4 class="card-text fw-bold">See review</h4>
                        <p>Get to know what people say and rate about every movie before you watch it.
                        </p>
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/images/give-comments.png') }}" style="height: 250px;" class="card-img-top"
                        alt="image">
                    <div class="card-body">
                        <h4 class="card-text fw-bold">Give review</h4>
                        <p>Rate and give your most honest opinion for the movie you have watched.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- Features Section --}}

    {{-- Movies Section --}}
    <div id="movies">
        <div class="content container pt-5">
            <h2 class="text-light text-center fw-bold">MOVIES</h2>
            <p class="text-center" style="color: rgb(182, 182, 182)">FEATURED MOVIES THIS WEEK</p>

            <div id="carouselExampleCaptions" class="carousel slide mt-5">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    @foreach ($banner as $b)
                        @if ($loop->first)
                            <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                        @endif
                        <div class="container-fluid g-0">
                            <div class="container-fluid header"
                                style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ $b->banner_url }});
                                    background-repeat: no-repeat; background-size: cover; padding-top: 10vh; padding-bottom: 10vh; height:420px;">
                                <div class="container header-detail ms-3 py-3">
                                    <p class="fw-bold mb-0 fs-6"><span style="color: #FF9416;">NEWEST</span> &nbsp <span
                                            class="text-white">UPDATE</span></p>
                                    <h1 class="text-white">
                                        @if (strlen($b->title) > 50)
                                            {{ substr($b->title, 0, 50) }}...
                                        @else
                                            {{ $b->title }}
                                        @endif
                                    </h1>

                                    <p class="text-white fs-6">
                                        @if (strlen($b->synopsis) > 255)
                                            {{ substr($b->synopsis, 0, 255) }}...
                                        @else
                                            {{ $b->synopsis }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    </div>
    {{-- Movies Section --}}
@endsection

@section('footer')
    <div id="footer-container" class="d-flex justify-content-center align-items-center">
        @include('footer')
    </div>
@endsection
