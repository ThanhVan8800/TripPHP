<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VungMien extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function DiaDanh()
    {
        return $this->hasMany(DiaDanh::class);
    }
}
