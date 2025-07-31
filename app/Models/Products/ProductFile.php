<?php

namespace App\Models\Products;

use App\Models\BaseModel;

class ProductFile extends BaseModel
{
    protected $table = 'products_files';

    protected $fillable = [
        'product_id',
        'file_name',
        'original_file_name',
        'file_type',
    ];

    protected $appends = [
        'file_url',
    ];

    public function getFileUrlAttribute()
    {
        return config('app.url') . '/storage/admin/' . $this->file_name;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
