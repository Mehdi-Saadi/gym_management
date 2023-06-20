<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    /**
     * @return HasOne
     * connection between courses and categories table
     */
    public function course(): HasOne
    {
        return $this->hasOne(Course::class);
    }
}
