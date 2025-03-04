<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Test extends Model
{
    use HasFactory;

    protected $table = 'test'; // Specify table name explicitly

    protected $primaryKey = 'id';

    public $timestamps = false; // Disable timestamps if you don't need Laravel's default

    protected $fillable = [
        'test',
        'score',
        'test_month',
        'test_year',
        'description',
        'media',
        'credential_url',
        'date_created',
        'date_updated',
        'is_verified',
        'verified_date',
        'verifier_id',
        'user_id',
        'add_to_cv',
    ];

    protected $casts = [
        'media' => 'array', // Cast JSON column to an array
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'verified_date' => 'datetime',
        'date_created' => 'datetime',
        'date_updated' => 'datetime',
    ];

    /**
     * Get the user who owns this test score.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the verifier (admin/staff) who verified this test score.
     */
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
