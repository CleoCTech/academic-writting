<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ClientFile extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    protected $fillable =[
        'client_id', 'order_id', 'folder', 'filename', 'from'
    ];
}
