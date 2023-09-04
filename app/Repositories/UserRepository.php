<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        return DB::transaction(function ()use ($attributes){

        $created = User::query()->create([
           'name'=>data_get($attributes,'name'),
            'email'=>data_get($attributes, 'email'),
            'password'=>Hash::make(data_get($attributes, 'password')),
        ]);
        return $created;
        });
    }

    public function update($user, array $attributes)
    {
        // TODO: Implement update() method.
        return DB::transaction(function ()use ($user, $attributes){
            $updated =$user->update([
               'name'=>data_get($attributes,'name',$user->name),
               'email'=>data_get($attributes,'email',$user->email),

            ]);
            return $user;
        });
    }

    public function forceDelete($user)
    {
        // TODO: Implement forceDelete() method.
        return DB::transaction(function ()use ($user){
           $deleted =$user->foreceDelete();

           return $deleted;
        });
    }
}
