<?php

namespace App\Models\Products;

use App\Models\BaseModel;
use App\Models\Entrepreneurships\Entrepreneurship;

class Product extends BaseModel
{
    public static $availableStatuses = [
        '0' => 'Disponible',
        '1' => 'Agotado',
    ];

    public static $availableCurrencies = [
        'NIO' => 'Córdoba Nicaragüense',
        'USD' => 'Dólar Estadounidense',
    ];

    public static $curreciesSymbols = [
        'NIO' => 'C$',
        'USD' => '$',
    ];

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'currency',
        'status',
        'entrepreneurship_id',
        'product_category_id',
    ];

    protected $appends = [
        'currency_symbol',
        'status_name',
        'formatted_price',
    ];

    public function getCurrencySymbolAttribute()
    {
        return self::$curreciesSymbols[$this->currency] ?? $this->currency;
    }

    public function getStatusNameAttribute()
    {
        return self::$availableStatuses[$this->status] ?? '';
    }

    public function getFormattedPriceAttribute()
    {
        return $this->currency_symbol . ' ' . number_format($this->price, 2, '.', ',');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function entrepreneurship()
    {
        return $this->belongsTo(Entrepreneurship::class, 'entrepreneurship_id');
    }

    public function files()
    {
        return $this->hasMany(ProductFile::class);
    }
}
