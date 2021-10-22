<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'fromable_id', 'toable_id', 'fromable_type', 'toable_type', 'value', 'order_no',
    'status'
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