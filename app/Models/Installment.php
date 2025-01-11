<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    protected $fillable = [
        'dueDate',
        'number',
        'contract_id', 
        'amount',
        'status',
    ];

    protected $casts = [
        'status' => 'string', 
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function lines()
    {
        return $this->hasMany(InstallmentLine::class);
    } 
}