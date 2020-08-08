<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'title' => 'Super Cheap Laptops For You In 2020',
                'author' => 1,
                'category_id' => 2,
                'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores, sint. Non animi eius obcaecati tenetur iste amet assumenda cum, sequi numquam dolorem repellat tempora nisi sed itaque? In facere tenetur necessitatibus a vel maxime sapiente nulla, incidunt harum voluptatum possimus quam accusantium, perspiciatis veritatis repellendus hic officiis, consequatur unde provident.',
                'featimg' => 'news5.jpg',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => 1
            ],
            [
                'title' => 'Tips And Trick Make Notes To Do List Plan Good',
                'author' => 1,
                'category_id' => 1,
                'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores, sint. Non animi eius obcaecati tenetur iste amet assumenda cum, sequi numquam dolorem repellat tempora nisi sed itaque? In facere tenetur necessitatibus a vel maxime sapiente nulla, incidunt harum voluptatum possimus quam accusantium, perspiciatis veritatis repellendus hic officiis, consequatur unde provident.',
                'featimg' => 'news1.jpg',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => 1
            ],
            [
                'title' => 'Exercitation Ullamco Laboris Nisi Ut Aliquip',
                'author' => 1,
                'category_id' => 3,
                'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores, sint. Non animi eius obcaecati tenetur iste amet assumenda cum, sequi numquam dolorem repellat tempora nisi sed itaque? In facere tenetur necessitatibus a vel maxime sapiente nulla, incidunt harum voluptatum possimus quam accusantium, perspiciatis veritatis repellendus hic officiis, consequatur unde provident.',
                'featimg' => 'news2.jpg',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => 1
            ],
            [
                'title' => 'Finally, Instagram Bought By Facebook',
                'author' => 1,
                'category_id' => 2,
                'content' => 'Totam rerum nemo ad aliquid velit distinctio quod ea voluptatum magni optio repellendus repudiandae nisi odio tenetur, praesentium animi placeat iusto ducimus recusandae ipsum vero vitae! Modi quis voluptas veniam, quisquam est maiores iure, vero tempore nemo, suscipit neque nesciunt fugiat vel quo ratione ea sed! Amet, quas, incidunt tempore placeat qui quibusdam adipisci maxime perferendis quae hic veritatis dolorem velit fugiat, libero voluptate ipsa id nam aut.',
                'featimg' => 'news3.jpg',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => 1
            ],
            [
                'title' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit',
                'author' => 1,
                'category_id' => 4,
                'content' => 'Maiores, sint. Non animi eius obcaecati tenetur iste amet assumenda cum, sequi numquam dolorem repellat tempora nisi sed itaque? In facere tenetur necessitatibus a vel maxime sapiente nulla, incidunt harum voluptatum possimus quam accusantium, perspiciatis veritatis repellendus hic officiis, consequatur unde provident.',
                'featimg' => 'news6.png',
                'status' => 'published',
                'published_at' => now(),
                'created_by' => 1
            ],
        ]);
    }
}
