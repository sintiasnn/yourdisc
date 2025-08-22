<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'title', 'genre', 'year', 'stock'];

    public function loanItems()
    {
        return $this->hasMany(LoanItem::class);
    }
}

