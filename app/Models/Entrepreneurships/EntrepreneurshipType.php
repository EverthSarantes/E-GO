<?php

namespace App\Models\Entrepreneurships;

use App\Models\BaseModel;

class EntrepreneurshipType extends BaseModel
{
    protected $table = 'entrepreneurship_types';

    protected $fillable = [
        'name',
        'description',
    ];

    public function entrepreneurships()
    {
        return $this->hasMany(Entrepreneurship::class, 'entrepreneurship_type_id');
    }
}
