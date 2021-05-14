<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_no', 'client_id', 'subject_id', 'topic', 'pages', 'deadline_date', 'deadline_time', 'instructions', 'status'
    ];
}