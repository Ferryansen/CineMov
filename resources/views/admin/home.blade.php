@section('styling')
<style>
* {
    margin: 0%;
    font-family: Gilroy, sans-serif;
    src : url(../gilroy-font/Gilroy-Bold.ttf);
    src : url(../gilroy-font/Gilroy-Heavy.ttf);
    src : url(../gilroy-font/Gilroy-Light.ttf);
    src : url(../gilroy-font/Gilroy-Medium.ttf);
    src : url(../gilroy-font/Gilroy-Regular.ttf);
    scroll-behavior: smooth;
    
}

:root {
    --color-orange: #f79421;
}

.content{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 80px;
}

.konten{
    background: linear-gradient(146.53deg, rgba(243, 243, 243, 0.4) -10.26%, rgba(243, 243, 243, 0.04) 84.29%);
    backdrop-filter: blur(30px);
    border-radius: 1.4em;
    text-align: center;
    padding: 60px;
    padding-left: 170px;
    padding-right: 170px;
    color: white;
    margin: 30px;
}

.konten:hover {
    background-color: #f79416;
    
}

.isi-1{
    font-size: 50px;
    font-weight: 700;
}

.isi-2{
    font-size: 25px;
}

a{
    text-decoration: none !important;
    color: white;
}

a:hover{
    color: white;
}

</style>
@endsection

@extends('layout')

@section('content')
<div class="content">
    <a href="{{ route('admin.view') }}">
    <div class="konten">
          <div class="isi-1">
              View Movies
          </div>
          <div class="isi-2">
            Movie's Name, Poster, Banner, Synopsis, Rating, Duration, and Views.
          </div>
        </div>
    </a>
    <a href="{{ route('admin.add') }}">
      <div class="konten">
          <div class="isi-1">
              Add Movie
          </div>
          <div class="isi-2">
            Movie's Name, Poster, Banner, Synopsis, Rating, Duration, and Views.
          </div>
        </div>
    </a>
      <div class="konten mb-96">
          <div class="isi-1">
              Update and Delete Movie
          </div>
          <div class="isi-2">
            Movie's Name, Poster, Banner, Synopsis, Rating, Duration, and Views.
          </div>
      </div>
  </div>
  <a href="{{ route('admin.manage') }}">
    <div class="konten">
        <div class="isi-1">
            Manage Users
        </div>
        <div class="isi-2">
            User's status
        </div>
      </div>
  </a>
@endsection