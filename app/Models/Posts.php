<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'author',
        'email',
        'company_name',
        'logo',
        'country',
        'register_time',
        'tags',
        'description'
    ];
    public $timestamps = false;

    //manual func for each post on click
    // public static function find($id){
    //     $posts = self::all();

    //     foreach($posts as $post){
    //         if($post['id'] == $id){
    //             return $post;
    //         }
    //     }
    // }

    //function for search and filtering from DB
    public function scopeFilter($query, array $filters){

        // dd($filters);

        if($filters['tag'] ?? false){
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('author', 'like', '%' . $filters['search'] . '%')
                ->orWhere('company_name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('country', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
        }
        
        //use clockwork extension for t-sql query output
    }
}
