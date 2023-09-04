<?php

namespace App\Repositories;

abstract class UserRepository extends BaseRepository
{

    abstract public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

   abstract public function update($model, array $attributes)
    {
        // TODO: Implement update() method.
    }

    abstract public function forceDelete($model)
    {
        // TODO: Implement forceDelete() method.
    }
}
