<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'volunteer';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'organization',
        'role',
        'cause',
        'is_current',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'location',
        'description',
        'media',
        'is_verified',
        'verified_date',
        'verifier_id',
        'user_id',
        'add_to_cv'
    ];

    protected $casts = [
        'media' => 'array',
        'is_current' => 'boolean',
        'is_verified' => 'boolean',
        'add_to_cv' => 'boolean',
        'verified_date' => 'datetime',
        'date_created' => 'datetime',
        'date_updated' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
