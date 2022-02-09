<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WriterRequest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'writer_id','client_id', 'order_id', 'status', 'time_limit', 'is_read' ];

    /**
     * Get the client that owns the WriterRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    /**
     * Get the writer that owns the WriterRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class, 'writer_id', 'id');
    }
    /**
     * Get the order that owns the WriterRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}