<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApproveRequest;
use App\Http\Requests\DiscussionRequest;
use App\Http\Resources\DiscussionResource;
use App\Models\Discusion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //List
        $discussions = Discusion::all();
        return DiscussionResource::collection($discussions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscussionRequest $request)
    {
        //Add a discussion
        $discussion = Discusion::create([
            "category_id" => $request->category_id,
            'user_id' => $request->user()->id,
            'title'=>$request->title,
            'text'=>$request->text,
            'image'=>$request->image,

        ]);

        return new DiscussionResource($discussion);
    }

    /**
     * Display the specified resource.
     */
    public function show(Discusion $discusion)
    {
        return new DiscussionResource($discusion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiscussionRequest $request, Discusion $discusion)
    {
        $discusion->update([
           'text'=>$request->text,
            'title'=>$request->title,
            'user_id'=>$request->user()->id,
            'category_id'=>$request->category_id,
            'image'=>$request->image
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discusion $discusion)
    {
        $discusion->delete();
        return response()->json([
            "Discussion has been deleted"
        ]);

    }
    public function approveDiscusion(ApproveRequest $request, Discusion $discusion){
        $discusion->update(['is_approved' => true]);

        return response()->noContent();
    }
}
