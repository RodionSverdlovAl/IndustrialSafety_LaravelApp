<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $guarded = false;

    protected $casts = [
        'user_ids' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'test_id', 'id');
    }
    public function assessments()
    {
        return $this->hasMany(Assessment::class, 'test_id', 'id');
    }
}
