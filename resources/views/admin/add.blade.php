<link rel="stylesheet" href="{{ asset('css/addMovie.css') }}">
@extends('layout')

@section('content')
    <div class="kotak-gede">
        
        <div class="header">
            <div class="judul-1">
                Add Movie
            </div>
            <div class="judul-2">
                Movie's Name, Poster, Banner, Synopsis, Rating, Duration, and Views.
            </div>
        </div>

        <hr>

        <form action="{{ route('admin.createMovie') }}" enctype="multipart/form-data" method="POST" style="width: 100%">
            @csrf
        <div class="content" style="width: 100%">
            <div class="gambar" style="width: 40%; height: 500px;" onclick="openfile()">
                <img src="/images/preview-img.png" height="100%" width="100%" id="previewImage">
                <input type="file" class="form-control @error('movieImage') is-invalid @enderror" style="display: none;" id="movieImage" name="movieImage" onchange="preview()"
                >
                @error('movieImage')
                    <div class="invalid-feedback">
                        {{ $message }}
                        
                    </div>
                @enderror

                
            </div>
            <div class="keterangan" style="width: 40%">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Movie's Name<br></label>
                    <input type="text" class="form-control @error('movieName') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Movie's Name" name="movieName" autofocus
                    value="{{ old('movieName') }}">
                    @error('movieName')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="date-dur d-flex align-items-center gap-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Rating<br></label>
                        <input type="text" class="form-control @error('movieRating') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Rating" name="movieRating" autofocus
                        value="{{ old('movieRating') }}">
                        @error('movieRating')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Duration<br></label>
                            {{-- <div class="d-flex align-items-center gap-2"> --}}
                            <input type="text" class="form-control @error('movieDuration') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Duration" name="movieDuration" autofocus
                            value="{{ old('movieDuration') }}">
                            @error('movieDuration')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
    
                        <div class="d-flex align-items-center">
                           
                            <h5 style="color:#f79421; font-weight:600; margin-bottom:-15 !important;">Minutes</h5>
                        </div>
                    </div>

                    
                </div>

                <div class="mb-3" id="movtra">
                    <label for="exampleFormControlInput1" class="form-label">Movie's Banner<br></label>
                    <input type="text" class="form-control @error('movieBanner') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Ex.https://link" name="movieBanner" autofocus
                    value="{{ old('movieBanner') }}">
                    @error('movieBanner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3" id="desc">
                    <label for="exampleFormControlTextarea1" class="form-label">Synopsis<br></label>
                    <textarea class="form-control @error('movieSynopsis') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" placeholder="Synopsis" name="movieSynopsis" autofocus
                    value="{{ old('movieSynopsis') }}"></textarea>
                    @error('movieSynopsis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3" id="movtra">
                    <label for="exampleFormControlInput1" class="form-label">Views<br></label>
                    <input type="text" class="form-control @error('movieViews') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Views" name="movieViews" autofocus
                    value="{{ old('movieViews') }}">
                    @error('movieSynopsis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                 
            </div>
            
            
        </div>

        <div class="tombol">
            <div class="tambah">
                <button type="submit" class="tambah-1">
                    Add
                </button>
            </div>
            <div class="kembali">
                <button class="kembali-1">
                    <a href="{{route('admin.home')}}">
                        Back
                    </a>
                </button> 
            </div>
        </div>

    </form>
        
    
    </div>

    <script>
        function preview() {
            document.getElementById('previewImage').src = URL.createObjectURL(event.target.files[0]);
        }

        function openfile(){
            document.getElementById('movieImage').click();
        }


    </script>
@endsection

    
