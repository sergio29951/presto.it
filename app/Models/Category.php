<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','name_en'];

    // ! Una categoria puo avere MOLTI prodotti

    public function products(){

        return $this->hasMany(Product::class);
    }

}