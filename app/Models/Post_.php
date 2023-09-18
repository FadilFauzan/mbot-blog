<?php

namespace App\Models;

class Post
{
    private static $blog_post = [
        [
        'title' => "Article 1",
        'slug' => "article-1",
        'author' => "Fadil Ahmad Fauzan",
        'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores quam illo aspernatur 
        ratione dolorem rerum exercitationem aperiam reprehenderit ipsa, numquam delectus error quod mollitia 
        ex, libero amet porro perspiciatis optio eum! Facilis dolore molestiae illum architecto harum, 
        distinctio pariatur nisi mollitia, obcaecati quia praesentium voluptatem, et sequi! Autem perspiciatis 
        iure quisquam aspernatur illum facilis quod molestias incidunt et labore ea reprehenderit blanditiis 
        excepturi consectetur accusantium aut, fuga aliquid doloremque. Nesciunt, aliquam aut fugiat asperiores 
        facere nihil veniam neque consequatur ipsa?"
        ],

        [
        'title' => "Article 2",
        'slug' => "article-2",
        'author' => "Shandika Galih",
        'body' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores quam illo aspernatur 
        ratione dolorem rerum exercitationem aperiam reprehenderit ipsa, numquam delectus error quod mollitia 
        ex, libero amet porro perspiciatis optio eum! Facilis dolore molestiae illum architecto harum, 
        distinctio pariatur nisi mollitia, obcaecati quia praesentium voluptatem, et sequi! Autem perspiciatis"
        ]
    ];

    public static function all(){
        return collect(self::$blog_post);
    }

    public static function find($slug){
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p){
        //     if ($p['slug'] === $slug){
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
