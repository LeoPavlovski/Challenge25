<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'title',
        'user_id',
        'category_id',
        'image',
        'is_approved'
     ];

     public function user()
     {
         return $this->belongsTo(User::class, 'user_id');
     }

     public function category()
     {
        return $this->belongsTo(Category::class, 'category_id');
     }

}
