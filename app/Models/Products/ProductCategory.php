<?php

namespace App\Models\Products;

use App\Models\BaseModel;

class ProductCategory extends BaseModel
{
    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }
}
