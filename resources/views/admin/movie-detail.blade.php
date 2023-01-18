@extends('layout')

@section('styling')
    <link rel="stylesheet" href="{{ asset('css/movie.css') }}">
@endsection

@section('content')
    @if (Session::has('message'))
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Hi, {{ auth()->user()->name }}!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{ Session::get('message') }}
                </div>
            </div>
        </div>

        <script>
            window.onload = (event) => {
                let myAlert = document.querySelector('.toast');
                let bsAlert = new bootstrap.Toast(myAlert);

                bsAlert.show();
            }
        </script>
    @endif

   
     {{-- movie detail --}}

    <img class= "banner container-fluid header" style="height: 500px;" src="{{$movie->banner_url}}" alt="">
    
        <h1 class="text-white">{{ $movie->title }}</h1>
        <br>
        <div class="detail-content">
            <div class="detail-1"> 
                <div class="detail-12">
                    <div>
                        <h5><span>New Release</span> 2021</h5>
                    </div>
                    
                    <div class="genre">
                        <h6>@foreach ($movie->genres as $g)
                            @if($loop->first)
                            {{$g->name}}
                            @else
                            • {{$g->name}}
                            @endif
                            @endforeach</h6>
                        </div>
                        
                        <div class="detail-2">
                            <div>
                                <i class="fw-bold fa-solid fa-user p-1 fs-6"></i>{{$movie->viewCount}}
                            </div>
                            <div>
                                <i class="fa-solid fa-star p-1 fs-6"></i>{{$movie->rating}}
                            </div>  
                        </div>
                    </div>

                    <div class ="adminbutton">
                        <a href="{{route('admin.update', ['id' => $movie->id])}}" role="button" class="btn btn-warning ">
                            Update
                        </a>
                        
                        <form action="{{route('admin.delete', ['id' => $movie->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        
                    </div>
                </div>
                
                <br>
                <p class = "desc">{{$movie->synopsis}}</p>
            </div>
            
            
@endsection

@section('footer')
    <div class="d-flex justify-content-center align-items-center" id ="footer">
        @include('footer')
    </div>
@endsection