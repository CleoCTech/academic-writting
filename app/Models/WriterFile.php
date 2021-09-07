<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriterFile extends Model
{
    use HasFactory;

    protected $fillable = ['writer_id', 'order_id', 'folder', 'filename', 'status'];


    
}
