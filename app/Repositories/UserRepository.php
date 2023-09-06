<?php

namespace App\Repositories;

use App\Events\Models\Users\UserCreated;
use App\Events\Models\Users\UserDeleted;
use App\Events\Models\Users\UserUpdated;
use App\Exceptions\GeneralJsonExpection;
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
        throw_if(!$created,GeneralJsonExpection::class,'Failed to create the models');
        event(new UserCreated($created));
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
            throw_if(!$updated,GeneralJsonExpection::class,'Failed to updated the models');
            event(new UserUpdated($updated));
            return $user;
        });
    }

    public function forceDelete($user)
    {
        // TODO: Implement forceDelete() method.
        return DB::transaction(function ()use ($user){
           $deleted =$user->foreceDelete();
           throw_if(!$deleted,GeneralJsonExpection::class,'Failed to delete the user.');
           event(new UserDeleted($deleted));
           return $deleted;
        });
    }
}
