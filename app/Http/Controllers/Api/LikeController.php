<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
class LikeController extends Controller
{
    public function likeOrUnlike(Request $request, $id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response([
                'message' => 'Không tìm thấy bài viết',
            ],403);
        }
        $like = $post->likes()->where('user_id',auth()->user()->id)->first();
        if(!$like)
        {
            Like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $id
            ]);
            return response([
                'message' => ' Create like'
            ],200);
        }
        $like->delete();
        return response([
            'message' => 'Disliked'
        ],200);
    }
}
