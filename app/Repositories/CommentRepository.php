<?php

namespace App\Repositories;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
class CommentRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
        return DB::transaction(function ()use($attributes){
           $comment = Comment::query()->create([
             'body'=>data_get($attributes,'body'),
               'user_id'=>data_get($attributes, 'user_id'),
               'post_id'=>data_get($attributes,'post_id'),
           ]);
        });
    }
    public function update($comment, array $attributes)
    {
        // TODO: Implement update() method.
        return DB::transaction(function ()use($comment,$attributes)
        {
            $updated = $comment->update([
                'body'=>data_get($attributes, 'body',$comment->body),
                'user_id'=>data_get($attributes,'user_id', $comment->user_id),
                'post_id'=>data_get($attributes,'post_id',$comment->post_id),
            ]);
            if(!$updated){
                throw new \Exception('failed to update comment');
            }

            return $updated;
        });

    }

    public function forceDelete($comment)
    {
        // TODO: Implement forceDelete() method.
        return DB::transaction(function ()use($comment){
           $deleted = $$comment->forceDelete();
           if(!$deleted){
               throw new \Exception('Failed to delete the comment');
           }
           return $deleted;
        });


    }


}
