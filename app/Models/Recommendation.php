<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    protected $table = 'recommendation';

    protected $fillable = [
        'recommender',
        'relationship',
        'month',
        'year',
        'description',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'user_id',
        'add_to_cv',
    ];

    protected $casts = [
        'media' => 'array',
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'verified_date' => 'datetime',
        'date_created' => 'datetime',
        'date_updated' => 'datetime',
    ];

    public $timestamps = false;

    // Relationship with the User who received the recommendation
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with the User who verified the recommendation
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
