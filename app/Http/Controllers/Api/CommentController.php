<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Discusion;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get comments
        $comments = Comment::all();
        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comments= Comment::create([
           "comment"=>$request->comment,
           "discusion_id"=>$request->discusion_id,
            "user_id"=>$request->user_id
        ]);
        return new CommentResource($comments);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //show the correct comment with the id
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        //update the comment ( only if the user is the same user that posted the comment)

        $comment->update([
           "comment"=>$request->comment,
           "discusion_id"=>$request->discusion_id,
            "user_id"=>$request->user_id,
        ]);
        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //Only authenticated users can delete the comment
        //Only if it's the same user

        $comment->delete();
//        $comment->update(['is_approved' => true]);

        return response()->json([
           "The comment has been deleted"
        ]);
    }

    public function approveComment(ApproveRequest $request, Discusion $discusion){
        $discusion->update(['is_approved' => true]);
        return response()->noContent();
    }
}
