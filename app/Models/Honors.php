<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honors extends Model
{
    use HasFactory;

    protected $table = 'honors';

    protected $fillable = [
        'title',
        'award_month',
        'award_year',
        'issuing_organization',
        'description',
        'media',
        'credential_url',
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

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
