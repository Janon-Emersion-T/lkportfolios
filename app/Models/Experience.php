<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experience';

    protected $fillable = [
        'user_id',
        'title',
        'employment_type',
        'company',
        'is_current',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'location',
        'location_type',
        'description',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'add_to_cv'
    ];

    protected $casts = [
        'is_current' => 'boolean',
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'media' => 'array',
        'verified_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
