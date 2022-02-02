<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory;
    use Notifiable;
    use SearchTrait;

    protected $fillable =[
        'order_no', 'client_id', 'subject_id', 'topic', 'pages', 'deadline_date', 'deadline_time', 'instructions', 'status', 'publish'
    ];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PaperCategory::class, 'subject_id', 'id');
    }

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    /**
     * Get all of the revisions for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function revisions(): HasMany
    {
        return $this->hasMany(RejectedOrder::class, 'order_id', 'id');
    }

    /**
     * Get the bill associated with the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bill(): HasOne
    {
        return $this->hasOne(OrderBilling::class, 'order_id', 'id');
    }

    /**
     * Get all of the files for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files(): HasMany
    {
        return $this->hasMany(ClientFile::class, 'order_id', 'id');
    }
    /**
     * Get all of the bids for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bids(): HasMany
    {
        return $this->hasMany(WriterBid::class, 'order_id', 'id');
    }

}