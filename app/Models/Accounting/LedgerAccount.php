<?php

namespace App\Models\Accounting;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LedgerAccount extends Model
{
    use HasFactory;
    use SearchTrait;
    protected $fillable = ['account_no', 'journal', 'period_id', 'debited_amount', 'credited_amount'];

    /**
     * Get the account that owns the LedgerAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'account_no', 'account_no');
    }
    /**
     * Get the period that owns the LedgerAccount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function period(): BelongsTo
    {
        return $this->belongsTo(FiscalPeriod::class, 'period_id', 'id');
    }
}
