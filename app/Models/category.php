<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = [

       
        'category_name',
        'category_image',
        'category_status'
        
       
    ];
}