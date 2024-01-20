<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = [
        'thing_id',
        'quantity',
        'total',
        'status',
    ];
    
    /**
     * Get the Thing that owns the purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function thing(): BelongsTo
    {
        return $this->belongsTo(thing::class,'thing_id');
    }

}
