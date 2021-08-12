<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaperCategory extends Model
{
    use HasFactory;

    /**
     * Get all of the orders for the PaperCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'subject_id', 'id');
    }
    /**
     * Get all of the writerSubjects for the PaperCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(SubjectHandle::class, 'subject_id', 'id');
    }
}