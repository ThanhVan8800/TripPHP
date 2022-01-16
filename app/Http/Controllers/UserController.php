<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected function fixImage(User $user)
    {
        // chay lenh php artisan storage:link
        if(Storage::disk('public')->exists($user->image)){
            $user->image = Storage::url($user->image);
        } else{
            $user->image = 'img/no_image_placeholder.png';
            // download 1 hinhf ddee vao thumuc public/img
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lstTaiKhoan = User::all();
        foreach($lstTaiKhoan as $tk)
        {
            $this->fixImage($tk);
        }
        return view('taikhoan.user_index',[
            'title'=>'Tafi khoan',
            'lstTK' => $lstTaiKhoan
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('taikhoan.user_add',[
            'title'=> 'Thêm tài khoản'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user -> fill([
            'name' => $request->input('name1'),
            'email' => $request->input('email1'),
            'image' => '',
            'password' => $request->input('password1')
        ]);
        $user ->save();
        if($request->hasFile('image')){
            $user->image = $request->file('image') -> store('image/tk'.$user->id,'public');
        }
        $user->save();
        return Redirect::route('taikhoan.show',['taikhoan'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->fixImage($user);
        return view('taikhoan.user_show',['taikhoan'=> $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
       // $lstTaiKhoan = User::all();
       $this->fixImage($user);
        return view('taikhoan.user_edit',[
            'title' => "Chinh sua",
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if($request->hasFile('image')){
            $user->image = $request->file('image')->store('image/tk'.$user->id,'public');
        }
        $user->fill([
            'name' => $request->input('name1'),
            'email' => $request->input('email1'),
            'password' => $request->input('password')
        ]);
        $user->save();
        return Redirect::route('taikhoan.show',[
            'taikhoan' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user -> delete();
        return Redirect::route('taikhoan.index');
    }
}
