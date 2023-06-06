<?php

namespace App\Models\Admin;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function wishlists(){
        return $this->hashMany(Wishlist::class);
    }
}
