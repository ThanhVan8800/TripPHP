<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Post;
class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'noi_dung',
        'user_id',
        'post_id'
    ];
}
