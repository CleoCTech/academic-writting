<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Message extends Model
{
    use HasFactory;
    protected $fillable = ['message', 'from_id', 'to_id','type', 'is_read' ];

    /**
     * Get the message_to associated with the Message
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function message_to(): HasOne
    {
        return $this->hasOne(MessageTo::class, 'message_id', 'id');
    }
}