<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderBilling extends Model
{
    use HasFactory;
    use SearchTrait;

    protected $fillable = ['order_id', 'client_id', 'amount', 'total_amount',
    'paid_amount', 'proposed_resell_price', 'sale_price', 'prepared_by'];

    /**
     * Get the client that owns the OrderBilling
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    /**
     * Get the order that owns the OrderBilling
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
