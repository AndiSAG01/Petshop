<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $fillable = [
        'name',
        'no_telp',
        'address',
       
    ];

    public function receivables(): HasMany
    {
        return $this->hasMany(receivable::class);
    }

    
}

