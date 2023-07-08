<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable  = ['Food_name','Food_price','Food_img','Food_description','Food_category','Weekly_featured'];
}
