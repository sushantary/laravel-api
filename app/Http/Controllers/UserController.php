<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 20;
        $users = User::query()->paginate($pageSize);
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, UserRepository $repository)
    {
        $created = $repository->create($request->only([
            'name',
            'email',
            'password',
        ]));
        return new UserResource($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user, PostRepository $repository)
    {
        $user = $repository->update($user,$request->only([
            'name',
            'title',
            'password',
        ]));
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, UserRepository $repository)
    {
        $user->$repository->forceDelete($user);
        return new \Illuminate\Http\JsonResponse([
            'data'=>'succesfully deleted'
        ]);
    }
}
