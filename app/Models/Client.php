<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * Get all of the orders for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }

    /**
     * Get all of the invoices for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(OrderBilling::class, 'client_id', 'id');
    }
    // /**
    //  * Get all of the revisions for the Client
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function revisions(): HasMany
    // {
    //     return $this->hasMany(RejectedOrder::class, 'from_id', 'id');
    // }
    public function toable(){
        return $this->morphMany(Messaging::class, 'toable');
    }
    public function fromable(){
        return $this->morphMany(Messaging::class, 'fromable');
    }

    public function notificationstoable()
    {
        return $this->morphMany(Notification::class, 'toable');
    }
    public function notificationsfromable()
    {
        return $this->morphMany(Notification::class, 'fromable');
    }
}