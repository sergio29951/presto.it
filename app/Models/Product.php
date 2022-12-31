<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'body', 'price'];

    public function toSearchAbleArray()
    {
        $category=$this->category;
        $array=[   
            'id'=>$this->id, 
            'title'=>$this->title,
            'body'=>$this->body,
            'category'=>$category
        ];
        return $array;
    }

    // ! un prodotto puo avere UNA SOLA CATEGORIA

    public function category(){

        return $this->belongsTo(Category::class);
    }
    
    public function user(){

        return $this->belongsTo(User::class);
    }
    
    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Product::where('is_accepted', null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getDescriptionSubstring(){

        if(strlen($this->body) > 50){
            return substr($this->body, 0, 50) . '...';           
        }else{
            return $this->body;
        }

    }

    public function getDescriptionSubstringCard(){

        if(strlen($this->body) > 20){
            return substr($this->body, 0, 20) . '...';           
        }else{
            return $this->body;
        }

    }
}
