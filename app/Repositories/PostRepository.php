<?php

namespace App\Repositories;

use App\Events\Models\Users\UserCreated;
use App\Exceptions\GeneralJsonExpection;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class PostRepository extends BaseRepository
{
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes): mixed
    {
        return  DB::transaction(function () use( $attributes){

            $created = Post::query()->create([
                'title'=>data_get($attributes,'title','Untitled'),
                'body'=>data_get($attributes,'body'),
            ]);
//            if(!$created) {
//                throw new GeneralJsonExpection('Failed to create Post.');
//            }
            throw_if(!$created,GeneralJsonExpection::class,'Failed to create Post.');
            if($userIds= data_get($attributes,'user_id')) {
                $created->users()->sync($userIds);
            }
            event(new UserCreated($created));
            return $created;
        });
    }


    /**
     * @param Post $post
     * @param array $attributes
     * @return mixed
     */
    public function update($post, array $attributes): mixed
    {
        return DB::transaction(function ()use($post, $attributes)
        {
            $updated= $post->update([
            'title'=>data_get($attributes,'title', $post->title),
            'body'=>data_get($attributes,'body',$post->body),
        ]);
        if(!$updated){
            throw  new Exception('failed to update post');
        }
        if($userIds = data_get($attributes, 'user_id')){
            $post->users()->sync($userIds);
        }
        return $post;
        });
    }

    /**
     * @param $post
     * @return mixed
     */
    public function forceDelete($post)
    {
        return DB::transaction(function ()use($post){
        $deleted = $post->forceDelete();
        if(!$deleted){
            throw new \Exception('failed to delete the post');
        }
        return $deleted;
        });


    }

}
