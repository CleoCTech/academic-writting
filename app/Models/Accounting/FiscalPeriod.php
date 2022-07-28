<?php

namespace App\Models\Accounting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FiscalPeriod extends Model
{
    use HasFactory;
    protected $fillable = ['fiscal_year_id', 'calender_month', 'period_name', 'start_date', 'end_date', 'status'];
    /**
     * Get all of the transactions for the FiscalPeriod
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(LedgerAccount::class, 'period_id', 'id');
    }
}