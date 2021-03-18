<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     //public $timestamps=false;
   protected $fillable = ['your_name','your_city','your_number','your_comment','publication_status'];
}
