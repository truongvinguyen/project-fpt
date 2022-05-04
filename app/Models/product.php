<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [

       
        'product_name',
        'product_price_sale',
        'product_price',
        'product_content',
        'category_id',
        'product_status',
        'product_image',
        'product_tag',
        'product_tag',
        'product_user',
        'created_at',
        'updated_at'

        
       
    ];
}
