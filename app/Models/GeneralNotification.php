<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralNotification extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'user_group', 'is_read'];
}