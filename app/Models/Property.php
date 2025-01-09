<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
        'zip_code',
        'status',
        'customer_id', 
    ];

    protected $casts = [
        'status' => 'string', 
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}