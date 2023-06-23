<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    
    protected $table = 'stock'; // Set the correct table name
    
    protected $fillable = [
        'product_id', 'email'
    ];
}

