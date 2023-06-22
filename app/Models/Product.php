<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name', 'description', 'price', 'file_path', 'category_id', 'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
{
    return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity');
}

}
