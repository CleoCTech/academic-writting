<?php

namespace App\Models;

use App\Models\MsgTo;
use App\Models\MsgFro;
use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Writer extends Model
{
    use HasFactory;
    use SearchTrait;

    protected $fillable = [
        'email',
        'password',
    ];

    public function toable(){
        return $this->morphMany(MsgTo::class, 'toable');
    }
    public function fromable(){
        return $this->morphMany(MsgFro::class, 'fromable');
    }
}