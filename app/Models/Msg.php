<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Msg extends Model
{
    protected $guarded = [];
    use HasFactory;

    // public function fromable()
    // {
    //     return $this->morphTo();
    // }


    /**
     * Get all of the msgsto/fro for the Msg
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messagesTo(): HasMany
    {
        return $this->hasMany(MsgTo::class, 'message_id', 'id');
    }
    public function messagesFro(): HasMany
    {
        return $this->hasMany(MsgFro::class, 'message_id', 'id');
    }
}
