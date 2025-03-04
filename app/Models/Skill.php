<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'skill',
        'skill_type',
        'skill_level',
        'use_on_CV',
        'is_verified',
        'verified_date',
        'verifier_id',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'verified_date' => 'datetime',
    ];

    // Relationship: A skill belongs to a user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: A skill has a verifier (Admin/User)
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
