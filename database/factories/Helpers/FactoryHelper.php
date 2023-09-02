<?php

namespace Database\Factories\Helpers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\HigherOrderCollectionProxy;

class FactoryHelper
{
    /**
     * This Function will get a random model id from the database
     * @param string $model
     * @return HigherOrderCollectionProxy|int|mixed
     */
    public function getRandomModelId(string $model): mixed
    {

        $count = $model::query()->count();

        if($count==0){
            //if model count is 0
            //we should create a new record and retrieve the record id
            return Post::factory()->create()->id;
        }else{
            //generate random number between 1 and model count
            return rand(1,$count);
        }
    }
}
