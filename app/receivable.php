<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class receivable extends Model
{
    protected $table = 'receivables';

    protected $fillable = [
        'supplier_id',
        'name_item',
        'quantity',
        'price',
        'total',
    ];

    /**
     * Get the supplier that owns the receivable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplier(): BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Get all of the payments for the receivable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany(payment::class);
    }
}
