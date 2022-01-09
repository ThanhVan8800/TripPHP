<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function BaiViet()
    {
        return $this->belongsTo(BaiViet::class);
    }
}
