<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index($id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response([
                'message' => 'Không có bình luận nào'
            ], 403);
        }
        return response([
            'comments' => $post->comments()->with('user:id,name,image')->get()
        ],200);
    }
    // tao. cmt
    public function store(Request $request, $id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response([
                'message' => 'not found'
            ],403);
        }
        //validator
        $attrs = $request->validate([
            'noi_dung' => 'required|string',
        ]);
        Comment::create([
            'noi_dung' => $attrs['noi_dung'],
            'user_id' => auth()->user()->id,
            'post_id' => $id
        ]);

        return response([
            'message' => 'Cmt đã được tạo'
        ],200);
    }
    //update cmt
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        if(!$comment)
        {
            return response([
                'message' => 'Khong tim thay cmt'
            ],403);
        }
        // validate
        $attrs = $request -> validator([
            'noi_dung' => 'required|string'
        ]);
        //update
        $comment -> update([
            'noi_dung' => $attrs['noi_dung']
        ]);
        return response([
            'message' => 'Cmt thanh cong'
        ],200);

    }
        //delete cmt
        public function destroy($id)
        {
            $comment = Comment::find($id);
            if(!$comment)
            {
                return response([
                    'message' => 'Khong tim thay cmt'
                ],403);
            }
            
            //update
            $comment -> delete();
            return response([
                'message' => 'delete success'
            ],200);
        }
}
