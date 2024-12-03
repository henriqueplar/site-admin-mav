<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'creci',
        'status',
    ];

    protected $casts = [
        'status' => 'string', 
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
