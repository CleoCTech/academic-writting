<?php

namespace App\Models;

use App\Models\Accounting\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfomation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'short_name',
        'establishment_date',
        'history',
        'vision',
        'mission',
        'location',
        'emails',
        'phone_numbers',
        'address',
        'logo',
        'account_no',
        'status',
    ];
    public function account(){
        return $this->morphMany(Account::class, 'accountable');
    }
}
