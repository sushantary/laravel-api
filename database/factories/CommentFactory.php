<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //get model count
        return [
            'body' =>[],
            'user_id'=> (new Helpers\FactoryHelper)->getRandomModelId(User::class),
            'post_id'=>(new Helpers\FactoryHelper)->getRandomModelId(Post::class)
        ];
    }
}
