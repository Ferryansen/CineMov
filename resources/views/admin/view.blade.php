@extends('layout')

@section('styling')
<style>
body{
    background-image: none;
    background-color: #17120F;
    overflow-y: scroll;

    margin: 0;
    padding: 0;
    height:100%;
    width: 100%;
}

.bg-gradient-primary{
    background-image: linear-gradient(#F7C283, #FFC107);
}

.bg-gradient-gray{
    background-image: linear-gradient(#959FA8, #8F8F90);
}

.bg-card-gradient{
    background-image: linear-gradient(to right,#504C4A, #231F1C);
}

.bg-card-button-gradient{
    background-image: linear-gradient(#504C4A, #17120F);
}

.bg-gradient-next-page-button{
    background-image: linear-gradient(135deg, #9A9A9A, #2C2C2C);
}

.card-text-color{
    color: #898785
}

.card-height{
    height: 500px;
}

.card-img-top{
    height:350px
}

.header-detail{
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 15px;
    width: 75%;
    text-align: justify;
}

.carousel-indicators{
    height:10px;
}

.carousel-indicators > button{
    position: relative;
    top: 40px;
    height: 10px !important;
    width: 10px !important;
    border-radius: 100vmax !important;
}

.radius-none{
    border-radius: 0;
}

.card-rating{
    position: absolute;
    width:50px;
    height: 50px;
}

.next-page-button{
    width: 50px;
    height: 50px;
}



@media only screen and (min-width: 800px) {
    .header-detail {
      width: 50%;
    }
}
</style>
@endsection

@section('searchbar')
<form action="{{route('admin.search')}}" method="get" class="w-75">
    <input class="form-control" type="text" placeholder="Search" name="q" aria-label="default input example">
</form>
@endsection

@section('content')
@if ($showBanner)
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active border-0" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class="border-0"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class="border-0" ></button>
        </div>

        <div class="carousel-inner">
            @foreach ($banner as $b)
              @if($loop->first)
                <div class="carousel-item active">
               @else
                <div class="carousel-item">
              @endif
                <div class="container-fluid g-0">
                  <div class="container-fluid header" style="background-image: url({{$b->banner_url}});
                            background-repeat: no-repeat; background-size: cover ; padding-top: 10vh; padding-bottom: 10vh; height:420px;">
                    <div class="container header-detail ms-3 py-3">
                      <p class="fw-bold mb-0 fs-6"><span style="color: #FF9416;">NEWEST</span> &nbsp <span class="text-white">UPDATE</span></p>
                      <h1 class="text-white">
                        @if (strlen($b->title) > 50)
                            {{substr($b->title, 0, 50)}}...
                        @else
                            {{$b->title}}
                        @endif
                    </h1>
                      <div class="d-flex justify-content-start align-items-center">
                        <a role="button" class="bg-gradient-gray text-white rounded-pill px-3 py-1 fw-bold mx-1 fs-6 text-decoration-none pe-auto">TRAILER</a>
                        <a role="button" class="bg-gradient-primary text-white rounded-pill px-3 py-1 fw-bold mx-1 fs-6 text-decoration-none pe-auto">DETAILS</a>
                      </div>
                      <p class="text-white fs-6">
                        @if (strlen($b->synopsis) > 255)
                            {{substr($b->synopsis, 0, 255)}}...
                        @else
                            {{$b->synopsis}}
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
      </div>
</div>
@endif

  <div class="container-fluid mt-5 pt-3">
    <div class="row gx-3 gy-5 justify-content-start mx-5">

        @foreach ($movie as $m)
            <div class="col-sm-6 col-lg-3">
            <div class="card p-0 border-0 radius-none card-height">
                @if(file_exists(public_path().'\storage/'.$m->poster_url))
                    <img class="card-img-top radius-none" src="{{asset('storage/'.$m->poster_url)}}" alt="Card image cap">
                @else
                    <img class="card-img-top radius-none" src="{{$m->poster_url}}" alt="Card image cap">
                @endif
                <div class="text-white position-absolute w-100 h-25 d-flex justify-content-end pe-3 mt-3">
                <span class="card-rating bg-primary rounded d-flex justify-content-center align-items-center fs-3 bg-gradient-primary text-white fw-bold">{{$m->rating}}</span>
                </div>
                <div class="card-body bg-card-gradient card-text-color">
                <h5 class="card-title text-white">
                    @if (strlen($m->title) > 32)
                        {{substr($m->title, 0, 32)}}...
                    @else
                        {{$m->title}}
                    @endif
                </h5>
                <p class="card-text mb-0">
                    @foreach ($m->genres as $g)
                        @if($loop->index == 2)
                            • ...
                            @break
                        @endif

                        @if($loop->first)
                            {{$g->name}}
                        @else
                             • {{$g->name}}
                        @endif
                    @endforeach
                </p>
                    <div class="d-flex justify-content-between">
                    <p class="card-text">{{$m->duration}} mins</p>
                    <a href="#" class="btn bg-card-button-gradient text-white border-0 rounded-pill">DETAIL</a>
                    </div>
                </div>
            </div>
            </div>

        @endforeach
    </div>

    @if($movie->lastitem() == null)
    <p class="text-center fs-1 text-white my-5 pt-5">Sorry, there is no movie available right now <br> (╥_╥)</p>
    @else
    <div class="d-flex justify-content-end align-items-center mt-4">

        @if (!$movie->onFirstPage())
            <a href="{{$movie->previousPageUrl()}}" class="text-white fs-1 ms-2 me-3 text-decoration-none"><</a>
        @endif

        @if($movie->lastPage() == 1)
            <a href="{{$movie->url(1)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>

        @elseif($movie->lastPage() == 2)
            @if($movie->currentPage() == 1)
                <a href="{{$movie->appends($_GET)->url(1)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>
                <a href="{{$movie->appends($_GET)->url(2)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">2</a>
            @else
                <a href="{{$movie->appends($_GET)->url(1)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>
                <a href="{{$movie->appends($_GET)->url(2)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">2</a>
            @endif

        @elseif($movie->lastPage() == 3)
            @if($movie->currentPage() == 1)
                <a href="{{$movie->appends($_GET)->url(1)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>
                <a href="{{$movie->appends($_GET)->url(2)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">2</a>
                <a href="{{$movie->appends($_GET)->url(3)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">3</a>
            @elseif($movie->currentPage() == 2)
                <a href="{{$movie->appends($_GET)->url(1)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>
                <a href="{{$movie->appends($_GET)->url(2)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">2</a>
                <a href="{{$movie->appends($_GET)->url(3)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">3</a>
            @else
                <a href="{{$movie->appends($_GET)->url(1)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>
                <a href="{{$movie->appends($_GET)->url(2)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">2</a>
                <a href="{{$movie->appends($_GET)->url(3)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">3</a>
            @endif

        @else
            @if($movie->onFirstPage())
                <a href="{{$movie->appends($_GET)->url(1)}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">1</a>
                <a href="{{$movie->appends($_GET)->url(2)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">2</a>
                <a href="{{$movie->appends($_GET)->url(3)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">3</a>
            @elseif($movie->onLastPage())
                <a href="{{$movie->appends($_GET)->url($movie->lastPage()-2)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">{{$movie->lastPage()-2}}</a>
                <a href="{{$movie->appends($_GET)->url($movie->lastPage()-1)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">{{$movie->lastPage()-1}}</a>
                <a href="{{$movie->appends($_GET)->url($movie->lastPage())}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">{{$movie->lastPage()}}</a>
            @else
                <a href="{{$movie->appends($_GET)->url($movie->currentPage()-1)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">{{$movie->currentPage()-1}}</a>
                <a href="{{$movie->appends($_GET)->url($movie->currentPage())}}" class="bg-gradient-primary next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">{{$movie->currentPage()}}</a>
                <a href="{{$movie->appends($_GET)->url($movie->currentPage()+1)}}" class="bg-gradient-next-page-button next-page-button d-flex justify-content-center align-items-center text-white fs-3 mx-2 text-decoration-none">{{$movie->currentPage()+1}}</a>
            @endif
        @endif

        @if (!$movie->onLastPage())
            <a href="{{$movie->nextPageUrl()}}" class="text-white fs-1 ms-2 me-3 text-decoration-none">></a>
        @endif

      </div>
      @endif
  </div>

  
@endsection

@section('footer')
    <div class="d-flex justify-content-center align-items-center">
        @include('footer')
    </div>
@endsection
