<?php

namespace App\Models\Entrepreneurships;

use App\Models\BaseModel;

class Department extends BaseModel
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'description',
    ];

    public function entrepreneurships()
    {
        return $this->hasMany(Entrepreneurship::class, 'department_id');
    }
}