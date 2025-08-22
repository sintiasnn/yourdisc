<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanItem extends Model
{
    use HasFactory;

    protected $fillable = ['loan_id', 'film_id', 'qty', 'returned_qty'];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
