<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected 
 $fillable = [
        'type',
        'document',
        'name',
        'birth',
        'phone',
        'email',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class); 

    }
}