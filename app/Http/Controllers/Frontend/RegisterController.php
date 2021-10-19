<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function viewSignUp(Request $request){

        return view('frontend.auth.user-register');
    }

    public function userRegister(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:user',
            'mobile_number' => 'required',
            'password' => 'required|string|min:6',
        ]);
        // 'password' => ['required', 'string', 'min:6', 'confirmed'],
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("login")->withSuccess('Great! You have Signup Successfully.');
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
