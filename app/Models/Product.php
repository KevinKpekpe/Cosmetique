<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function getSlug(): string
    {
        return Str::slug($this->title);
    }
    // public function getPrice(){
    //     $price = $this->price / 10;
    //     return number_format($price,2,'.','') . '$';
    // }
    
}
