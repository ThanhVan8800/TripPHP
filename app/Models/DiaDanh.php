<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class DiaDanh extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function VungMien()
    {
        return $this->belongsTo(VungMien::class);
    }
    public function NhuCau()
    {
        return $this->hasMany(NhuCau::class);
    }
    public function HinhAnh()
    {
        return $this->hasMany(HinhAnh::class);
    }
    public function BaiViet()
    {
        return $this->hasMany(BaiViet::class);
    }
    public function User()
    {
        return $this->hasMany(User::class);
    }
}
