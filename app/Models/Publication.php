<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publication';

    protected $fillable = [
        'title',
        'publication_month',
        'publication_year',
        'publisher',
        'contributors',
        'description',
        'publication_url',
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


    /**
     * Get the user who owns the publication.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the verifier who verified the publication.
     */
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
