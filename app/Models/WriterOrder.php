<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WriterOrder extends Model
{
    use HasFactory;

    protected $fillable =['writer_id', 'order_id', 'status'];

    /**
     * Get the user that owns the WriterOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function writer(): BelongsTo
    {
        return $this->belongsTo(Writer::class, 'writer_id', 'id');
    }

}