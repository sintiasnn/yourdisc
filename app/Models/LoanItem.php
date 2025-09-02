<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LoanItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }
}