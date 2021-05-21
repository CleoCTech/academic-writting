<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageTo extends Model
{
    use HasFactory;
    protected $fillable = ['message_id', 'to_id','to_type', 'is_read'];

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'message_id', 'id');
    }
}