<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class thing extends Model
{
    protected $table = 'things';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'weigth',
        'stok',
    ];

    /**
     * Get all of the purchases for the thing
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function things(): HasMany
    {
        return $this->hasMany(thing::class);
    }
}
