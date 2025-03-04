<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'organization';

    protected $fillable = [
        'organization',
        'position_held',
        'membership_ongoing',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'description',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'user_id',
        'add_to_cv',
    ];

    protected $casts = [
        'membership_ongoing' => 'boolean',
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'media' => 'array',
        'verified_date' => 'datetime',
        'date_created' => 'datetime',
        'date_updated' => 'datetime',
    ];

    public $timestamps = false;

    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_updated';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
