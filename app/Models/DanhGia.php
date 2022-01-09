<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanhGia extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function User()
    {
        return $this->hasMany(User::class);
    }
    public function BaiViet()
    {
        return $this->hasMany(BaiViet::class);
    }
}
