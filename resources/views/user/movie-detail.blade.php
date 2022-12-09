@extends('layout')

@section('styling')
    <link rel="stylesheet" href="{{ asset('css/movie.css') }}">
@endsection

@section('content')
    <h1 class="text-white">Movie No: {{ $movie->id }}</h1>

    {{ $createButtonClicked = false; }}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" id="commentButton" data-bs-toggle="modal" data-bs-target="#commentModal">
        @if (count($errors) > 0)
            Re-Comment
        @else
            Comment
        @endif
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('comment.store', $movie->id) }}" method="POST">
                    @csrf
                    <div class="modal-head">
                        <h1 class="modal-title fs-4" id="titleModal">How's the movie?</h1>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="number"
                                class="form-control text-warning bg-transparent @error('rating') is-invalid @enderror"
                                id="rating" placeholder="1 to 10" name="rating" min="1" max="10" value="{{ old('rating') }}">
                            <label class="text-warning" for="rating">Your rating</label>
                            @error('rating')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control text-warning bg-transparent @error('description') is-invalid @enderror" placeholder="Tell us more about the movie" id="floatingTextarea">{{ old('description') }}</textarea>
                            <label for="description" class="text-warning">Comment</label>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="modal-footer border-0">
                        <button type="submit" class="w-100 btn btn-md btn-warning">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- This is for comment section, feel free to change it :D --}}
    <div>
        {{-- {{ dd($movie->comments) }} --}}
        @foreach ($movie->comments as $comment)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $comment->user->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rate: {{ $comment->rating }}</h6>
                    <p class="card-text">{{ $comment->description }}</p>
                    @if ($comment->user_id == $currUser)
                        <button type="button" class="btn btn-warning" id="updateCommentButton" data-bs-toggle="modal" data-bs-target="#updateCommentModal-{{ $comment->id }}">
                            Edit
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="updateCommentModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('comment.update', [$comment->id]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-head">
                                            <h1 class="modal-title fs-4" id="titleModal">Edit your comment here - {{ $comment->id }}</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="number"
                                                    class="form-control text-warning bg-transparent @error('rating') is-invalid @enderror"
                                                    id="rating" placeholder="1 to 10" name="rating" min="1" max="10" value="{{ $comment->rating }}">
                                                <label class="text-warning" for="rating">Your rating</label>
                                                @error('rating')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea name="description" class="form-control text-warning bg-transparent @error('description') is-invalid @enderror" placeholder="Tells us more about the movie" id="floatingTextarea">{{ $comment->description }}</textarea>
                                                <label for="description" class="text-warning">Comment</label>
                    
                                                @error('description')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="modal-footer border-0">
                                            <button type="submit" class="w-100 btn btn-md btn-warning">Update Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('comment.destroy', [$comment->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection