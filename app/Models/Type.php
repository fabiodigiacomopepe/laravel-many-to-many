<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        "tipo",
        "di_gruppo"
    ];

    public function project() {
        return $this -> hasMany(Project :: class);
    }
}
