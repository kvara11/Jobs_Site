<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    
    // protected $fillable = [
    //     'name',
    //     'author',
    //     'email',
    //     'company_name',
    //     'logo',
    //     'country',
    //     'register_time',
    //     'tags',
    //     'description'
    // ];
}
