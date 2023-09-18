<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();

        Category::create([
            "name" => "Web Programming",
            "slug" => "web-programming",
        ]);

        Category::create([
            "name" => "Personal",
            "slug" => "personal",
        ]);

        Category::create([
            "name" => "Web Design",
            "slug" => "web-design",
        ]);


        Post::factory(25)->create();

        // Post::create([
        //     "title" => "Judul Kedua",
        //     "category_id" => 1,
        //     "user_id" => 1,
        //     "slug" => "judul-pertama",
        //     "excerpt" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem similique quae magni cum facilis, nulla, quia accusamus ",
        //     "body" => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem similique quae magni cum facilis, nulla, itaque aut impedit recusandae a, voluptatibus numquam repellendus incidunt consequuntur</p>
        //     <p>quia accusamus labore porro maiores harum minus! Optio asperiores voluptas, quo ipsam ut quisquam in quasi, itaque laborum alias commodi consectetur voluptatem. Ab impedit a, nihil quam inventore reprehenderit earum pariatur beatae ipsum quis ea amet molestiae similique fugiat mollitia odit in necessitatibus tenetur? Voluptas minima tempora soluta labore, explicabo pariatur earum possimus repellendus est.</p>"
        // ]);
    }
}
