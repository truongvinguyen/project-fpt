<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageProduct extends Model
{
    
    use HasFactory;
    public $timestamps = false;
    protected $table = 'image_product_detail';
    protected $fillable = [

       
        'image_name',
        'image',
        'product_id'
       

        
       
    ];
}
