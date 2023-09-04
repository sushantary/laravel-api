<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\factories\PostFactory;

class PostSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->DisableForeignKeys();
        $this->truncate('posts');
       $posts= Post::factory(200)
//            ->has(Comment::factory(3),'comments')
//            ->untitled()
            ->create();


        $posts->each(function (Post $post){
            $post->users()->sync([(new \Database\Factories\Helpers\FactoryHelper)->getRandomModelId(User::class)]);
        });
        $this->EnableForeignKeys();
    }
}
