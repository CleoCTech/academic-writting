<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubjectHandle extends Model
{
    use HasFactory;

    protected $fillable = ['writer_id', 'subject_id'];

    /**
     * Get the subject that owns the SubjectHandle
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(PaperCategory::class, 'subject_id', 'id');
    }
}