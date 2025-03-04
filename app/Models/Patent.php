<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'patent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'patent_application_number',
        'status',
        'issue_date',
        'inventors',
        'description',
        'patent_url',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'user_id',
        'add_to_cv',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'issue_date' => 'date',
        'media' => 'array',
        'is_verified' => 'boolean',
        'verified_date' => 'datetime',
        'add_to_cv' => 'boolean',
    ];

    /**
     * Get the user that owns the patent.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the verifier of the patent.
     */
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
