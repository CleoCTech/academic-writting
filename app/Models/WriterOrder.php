<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriterOrder extends Model
{
    use HasFactory;

    protected $fillable =['writer_id', 'order_id', 'status'];

}
