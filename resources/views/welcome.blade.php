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
        height: 90vh;
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

    #features,
    #movies {
        background-image: none;
        background: linear-gradient(179.78deg, #17120F 25.79%, #44312B 83.31%);
        backdrop-filter: blur(2px);
    }

    #footer-container {
        background: #44312B;
        backdrop-filter: blur(2px);
        width: 100%;
    }
</style>

@extends('layout')

@section('content')
    <div id="home" class="container">
        <div class="content">
            <h2 class="text-white fw-bold">Browse movies, see what people say, and give your opinions !</h2>
            <p class="text-white">Discover new movies</p>
            <div class="mt-3">
                <a href="/register" class="btn btn-warning">Sign up</a>
                <a href="/login" class="btn btn-outline-warning">Sign in</a>
            </div>
        </div>
    </div>

    <div id="features">
        <div class="content container pt-5">
            <h2 class="text-light text-center fw-bold">FEATURES</h2>

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
