<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WriterBid extends Model
{
    use HasFactory;

    protected $fillable =[
        'writer_id', 'order_id', 'bid', 'price', 'status'
    ];

    /**
     * Get the writer associated with the WriterBid
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function writer(): HasOne
    {
        return $this->hasOne(Writer::class, 'id', 'writer_id');
    }
    /**
     * Get the order that owns the WriterBid
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}