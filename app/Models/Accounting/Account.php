<?php

namespace App\Models\Accounting;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Account extends Model
{
    use HasFactory;
    use SearchTrait;
    protected $fillable = ['account_no', 'account_name', 'accountable_id', 'accountable_type', 'opening_balance', 'status'];

    public function accountable()
    {
        return $this->morphTo();
    }
    /**
     * Get all of the transactions for the Account
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(LedgerAccount::class, 'account_no', 'account_no');
    }
}