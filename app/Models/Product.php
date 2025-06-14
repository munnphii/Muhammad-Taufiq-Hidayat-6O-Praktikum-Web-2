<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

public function category() {
    return $this->belongsTo(Category::class);
}
public function unit() {
    return $this->belongsTo(Unit::class);
}
    /**
     * fillble
     * 
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'stock',

    ];
}
