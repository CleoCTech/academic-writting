<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationDetails extends Model
{
    use HasFactory;
    protected $fillable = ['verify_id', 'side', 'folder', 'filename'];
}
