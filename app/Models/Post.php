<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =['name', 'slug', 'extract', 'body', 'status', 'user_id', 'category_id'];

    //relacion uno amuchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relacion muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);

    }

    //relacion uno a uno polimorficaca
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
