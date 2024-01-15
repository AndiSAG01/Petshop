<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'receivable_id',
        'sp_id',
        'date',
        'image',
        'pay',
        'total',
        'status',
    ];

    /**
     * Get the receivable that owns the payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function receivable(): BelongsTo
    {
        return $this->belongsTo(receivable::class);
    }
/**
 * Get the sp that owns the payment
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function sp(): BelongsTo
{
    return $this->belongsTo(sp::class);
}
    
}
