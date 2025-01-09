<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'type',
        'value_type',
        'value',
        'percentage',
        'payment_frequency',
        'installments',
    ];


    public function contract()
    {
        return $this->belongsTo(Contract::class);
    } 
}