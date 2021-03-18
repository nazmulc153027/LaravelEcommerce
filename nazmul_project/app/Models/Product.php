<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['your_id','brand_id','product_name','product_price','product_quantity','short_description','long_description','product_image','publication_status'];
}
