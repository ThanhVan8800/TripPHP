<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BinhLuan extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function BaiViet()
    {
        return $this->belongsTo(BaiViet::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
