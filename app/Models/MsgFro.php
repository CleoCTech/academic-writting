<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
