<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messaging extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'fromable_id', 'toable_id', 'fromable_type', 'toable_type',
    'is_read'
    ];

    public function fromable()
    {
        return $this->morphTo();
    }
    public function toable()
    {
        return $this->morphTo();
    }
}