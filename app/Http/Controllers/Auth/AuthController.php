<?php
namespace App\Http\Controllers\Auth;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController {

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage')->with('success','logout Successfully');
    }

}