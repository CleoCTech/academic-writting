<?php

namespace App\Models;

use App\Models\Accounting\Account;
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
        return $this->morphMany(Messaging::class, 'toable');
    }
    public function fromable(){
        return $this->morphMany(Messaging::class, 'fromable');
    }
    public function account(){
        return $this->morphOne(Account::class, 'accountable');
    }

}
