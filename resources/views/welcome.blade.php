<style>
    body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%
    }

    #home,
    #movies,
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

    #features .content {}

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
</style>

@extends('layout')

@section('content')
    <div id="home" class="container">
        <div class="content">
            <h2 class="text-white fw-bold">Browse movies, see what people say, and give your opinions !</h2>
            <div class="mt-3">
                <a href="/register" class="btn btn-warning">Sign up</a>
                <a href="/login" class="btn btn-outline-warning">Sign in</a>
            </div>
        </div>
    </div>

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

    <div id="movies">
        <div class="content container pt-5">
            <h2 class="text-light text-center fw-bold">MOVIES</h2>

        </div>
    </div>
@endsection

@section('footer')
    <div id="footer-container" class="d-flex justify-content-center align-items-center">
        @include('footer')
    </div>
@endsection
