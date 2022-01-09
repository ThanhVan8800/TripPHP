<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // private $response = [
    //     'message' => null,
    //     'data' => null
    // ];
    public function register(Request $request)
    {
        $rules =[
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:6'
        ];
        // đăng nhập bằng tên hoặc email
        // $data = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        // $this->response['message'] = 'success';
        // return response()->json($this->response,200);
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        // create new user in users table
        $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('Personal Access Token')-> plainTextToken;
        $response = ['user' => $user, 'token' => $token];

        //return user & token
        return response()->json($response,200);
    }
    
    public function login(Request $request)
        {
            //validate inputs
            $rules = [
                'email' => 'required',
                'password' => 'required|string'
            ];
            $request->validate($rules);
            // tìm cái email user trong bảng user
            $user = User::where('email', $request->email)->first();
            //find user email vaf pass chinsh xac
            if($user && Hash::check($request->password, $user->password)){
                $token = $user-> createToken('Personal access Token')->plainTextToken;
                $response = ['user' => $user, 'token' => $token];
                return response()->json($response, 200);
            }
            $response = ['message' => 'Không đúng email or Password'];
            return response()->json($response, 400);
        }

        // đăng xuất
    // public function logout(){
    //     auth()->user()->tokens()->delete();
    //     return response([
    //         'message' => "Đăng xuất thành công"
    //     ],200);
    // }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    // get user detail
    public function user(){
        return response([
            'user' => auth()->user()
        ], 200);
    }
}
