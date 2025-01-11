<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstallmentLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'installment_id',
        'description',
        'value',
    ];


    public function installment()
    {
        return $this->belongsTo(Installment::class);
    } 
}
