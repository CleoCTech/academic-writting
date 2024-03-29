<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdVerification extends Model
{
    use HasFactory;

    protected $fillable = ['writer_id', 'type'];
}