<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiViet extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function LuotXem()
    {
        return $this->hasMany(LuotXem::class);
    }
    public function Like()
    {
        return $this->hasMany(Like::class);
    }
    public function DanhGia()
    {
        return $this->hasMany(DanhGia::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function DiaDanh()
    {
        return $this->belongsTo(DiaDanh::class);
    }
    public function HinhAnh()
    {
        return $this->hasMany(HinhAnh::class);
    }
    public function DisLike()
    {
        return $this->belongsTo(DisLike::class);
    }
    public function BinhLuan()
    {
        return $this->hasMany(BinhLuan::class);
    }
}
