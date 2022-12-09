<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $movie_id)
    {
        $commentInput = $request->all();
        $commentInput['user_id'] = auth()->user()->id;
        $commentInput['movie_id'] = $movie_id;

        Comment::create($commentInput);

        return back();
    }

    public function update(CommentRequest $request, $comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->update([
            'rating' => $request->rating,
            'description' => $request->description
        ]);

        return back();
    }

    public function destroy($comment_id)
    {
        $comment = Comment::findOrFail($comment_id);
        $comment->delete();

        return back();
    }
}
