<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'project';

    protected $fillable = [
        'user_id',
        'title',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'is_current',
        'description',
        'media',
        'contributors',
        'is_verified',
        'verified_date',
        'verifier_id',
        'add_to_cv',
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
        return $this->belongsTo(User::class, 'user_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verifier_id');
    }
}
