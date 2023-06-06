<?php

namespace App\Models\Admin\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    public function postcategory(){
        return $this->belongsTo(PostCategory::class,'post_category_id','id');
    }
}
