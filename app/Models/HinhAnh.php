<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HinhAnh extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function DiaDanh()
    {
        return $this->belongsTo(DiaDanh::class);
    }
    public function Post()
    {
        return $this->belongsTo(Post::class);
    }
}
