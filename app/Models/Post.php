<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = ["title", 'excerpt', "body"];
    protected $guarded = ['id'];
    protected $with = ['category', 'author']; // Debug n+1 problem (eager load)


    public function scopeFilter($query, array $filters) {

        // if($filters['search'] ?? false) {
        //     return $query->where('title', 'like', '%' . $filters['search']  . '%')
        //             ->orWhere('title', 'like', '%' . $filters['search']  . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) { // when() dijalankan jika argumen pertama true
            return $query->where('title', 'like', '%' . $search  . '%')
                        ->orWhere('body', 'like', '%' . $search  . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) { // whereHas() = dimana kaitan dengan relasi
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, fn($query, $author) =>
                $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }


    // membuat relasi dengan class Category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // membuat relasi dengan class User
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
