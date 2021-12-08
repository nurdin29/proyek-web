<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table="artikels";
    protected $fillable=[
        'category_id',
        'name',
        'watak',
        'konten',
        'file',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
