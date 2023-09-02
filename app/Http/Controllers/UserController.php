<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new \Illuminate\Http\JsonResponse([
            'data'=> 'Hello',
        ]);
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
    public function store(Request $request)
    {
        return new \Illuminate\Http\JsonResponse([
            'data'=>'posted'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'data'=>$user
        ]);
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
    public function update(Request $request, string $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'data'=>'patched'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return new \Illuminate\Http\JsonResponse([
            'data'=>'deleted'
        ]);
    }
}
