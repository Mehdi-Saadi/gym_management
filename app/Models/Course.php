<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'trainer_id',
        'info',
        'photo_name',
        'count_of_sessions_per_week',
    ];

    /**
     * @return BelongsTo
     * connection between trainers and courses table
     */
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    /**
     * @return BelongsTo
     * connection between courses and categories table
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return HasMany
     * connection between courses and members table
     */
    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
