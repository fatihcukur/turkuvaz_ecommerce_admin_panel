<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_title',
        'product_category_id',
        'barcode',
        'product_status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'product_category_id');
    }
}
