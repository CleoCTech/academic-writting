<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MsgFro extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function fromable()
    {
        return $this->morphTo();
    }
    public function toable()
    {
        return $this->morphTo();
    }

     /**
     * Get the message that owns the MsgTo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function message(): BelongsTo
    {
        return $this->belongsTo(Msg::class, 'message_id', 'id');
    }
}
