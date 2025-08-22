<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'loan_date', 'due_date', 'returned_at', 'status'];

    protected $casts = [
        'loan_date' => 'date',
        'due_date' => 'date',
        'returned_at' => 'datetime',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function items()
    {
        return $this->hasMany(LoanItem::class);
    }
}

