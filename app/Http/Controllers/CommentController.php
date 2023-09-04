<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $comments = Comment::query()->paginate($pageSize);
        return CommentResource::collection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,CommentRepository $repository)
    {
        $created = $repository->create($request->only([
            'body',
            'user_id',
            'post_id',
        ]));
        return new CommentResource($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $comment, CommentRepository $repository)
    {
        $updated =$repository->$comment->update($request->only([
            'body',
            'user_id',
            'post_id',
        ]));
        return new CommentResource($comment);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment, CommentRepository $repository)
    {
        $comment->$repository->forceDelete($comment);
        return new JsonResponse([
            'data'=>'success'
        ]);
    }
}
