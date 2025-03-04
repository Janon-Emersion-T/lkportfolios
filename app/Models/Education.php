<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $fillable = [
        'user_id',
        'school',
        'degree',
        'field_of_study',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'grade',
        'is_current',
        'activities',
        'description',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'add_to_cv',
    ];

    protected $casts = [
        'media' => 'array',
        'is_current' => 'boolean',
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'verified_date' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
