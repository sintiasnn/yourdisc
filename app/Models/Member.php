<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'phone', 'address'];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
