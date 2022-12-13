<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    public $timestamps = false;


    public static function find($id){
        $posts = self::all();

        foreach($posts as $post){
            if($post['id'] == $id){
                return $post;
            }
        }
    }
}
