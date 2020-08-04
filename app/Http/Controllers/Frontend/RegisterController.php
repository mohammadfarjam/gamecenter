<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\verify_email;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
//        $register=new User();
//        $register->name = $request['name'];
//        $register->email = $request['email'];
//        $register->password = Hash::make($request['password']);
//
//        $register->save();

//        Mail::to($request->email)->send(new verify_email());
    }
}
