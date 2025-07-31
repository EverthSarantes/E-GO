<?php

namespace App\Models\Entrepreneurships;

use App\Models\BaseModel;
use App\Models\User;
use App\Models\Products\Product;

class Entrepreneurship extends BaseModel
{
    protected $table = 'entrepreneurships';

    protected $fillable = [
        'name',
        'years_of_experience',
        'description',
        'department_id',
        'user_id',
        'entrepreneurship_type_id',
    ];

    public function department()
    {
        /* return $this->belongsTo('App\Models\Department'); */
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function entrepreneurshipType()
    {
        return $this->belongsTo(EntrepreneurshipType::class, 'entrepreneurship_type_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'entrepreneurship_id');
    }
}
