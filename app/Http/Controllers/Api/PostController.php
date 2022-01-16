<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class PostController extends Controller
{
    // lay tat ca cac bai posts
    public function index()
    {
        return response([
            'posts' => Post::orderBy('created_at', 'desc')->with('user:id','name', 'image')->withCount('comments','likes')
            ->with('likes', function($like){
                return $like->where('user_id', auth()->user()->id)
                ->select('id','user_id','post_id')->get();
            })
            // lấy hết tất cả, desc xếp giảm dần
        ],200);
    }
    //xem bai
    public function show($id)
    {
        return response([
            'post' => Post::where('id', $id)->withCount('comments', 'likes')->get()
        ],200);
    }
    // tao. bai
    public function store(Request $request)
    {
        // validate fields
        $attrs = $request->validate([
            'body' => 'required|string',
        ]);
        $image = $this->saveImage($request->image,'posts');
        // tao.
        $post = Post::create([
            'body' => $attrs['body'],
            'user_id' => auth()->user()->id,
            'image' => $image
        ]);

        return response([
            'message' => 'Tạo bài viết thành công',
            'post' => $post
        ]);
    }
    //update bai viet
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response([
                'message' => 'Không tìm thấy bài viết'
            ],403);
        }
        if($post->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Từ chối bài viết này'
            ],403);
        }
        // validate
        $attrs = $request->validate([
            'body' => ' required | string'
        ]);
        //update
        $post->update([
            'body' => $attrs['body']
        ]);
        return response([
            'message' => 'Update success',
            'post' => $post
        ],200);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post)
        {
            return response([
                'message' => 'Xóa thất bại'
            ],403);
        }
        if($post->user_id != auth()->user()->id)
        {
            return response([
                'message' => 'Xóa thất bại'
            ],403);
        }
        $post->comments()->delete();
        $post->likes()->delete();
        $post->delete();
        return response([
            'message' => 'Xóa thành công',
            'posts' => $post
        ],200);
    }
}
