<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'kode_product',
        'name_product',
        'description_product',
        'jml_product',
        'price_product',
        'trending',
        'featured'
    ];

    public function productImage()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}