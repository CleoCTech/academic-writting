<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientFile extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable =[
        'client_id', 'order_id', 'folder', 'filename', 'from'
    ];

    /**
     * Get the Order that owns the ClientFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}