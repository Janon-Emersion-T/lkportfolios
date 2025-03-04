<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class License extends Model
{
    use HasFactory;

    protected $table = 'license';

    protected $fillable = [
        'user_id',
        'name',
        'issuing_organization',
        'issue_month',
        'issue_year',
        'expiration_month',
        'expiration_year',
        'credential_id',
        'credential_url',
        'description',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'add_to_cv',
    ];

    protected $casts = [
        'media' => 'array',
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'verified_date' => 'datetime',
    ];

    /**
     * Get the user who owns this license or certification.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the verifier (admin/staff) who verified this certification.
     */
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
