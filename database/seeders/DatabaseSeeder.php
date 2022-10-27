<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Comment::truncate();
        Ticket::truncate();
        User::truncate();
        Category::truncate();

        

        $user1 = User::factory()->create([
            'is_admin' => 1
        ]);
        $user2 = User::factory()->create();
        $user3 = User::factory()->create();

        $cat1 = Category::factory()->create();
        $cat2 = Category::factory()->create();

        Ticket::factory(3)->create([
            'user_id'=>$user2->id,
            'category_id'=>$cat1->id
        ]);

        Ticket::factory(2)->create([
            'user_id'=>$user3->id,
            'category_id'=>$cat2->id
        ]);

        Comment::factory(2)->create([
            'user_id'=>$user2->id,
            'ticket_id'=>'1'
        ]);

        Comment::factory(2)->create([
            'user_id'=>$user3->id,
            'ticket_id'=>'4'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
