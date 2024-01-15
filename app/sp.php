<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class sp extends Model
{
    protected $table = 'sps';

    protected $fillable = [
        'name',
        'address',
        'no_telp',
    ];

    /**
     * Get all of the sps for the sp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sps(): HasMany
    {
        return $this->hasMany(sp::class);
    }
}
