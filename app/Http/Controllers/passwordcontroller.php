<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class passwordcontroller extends Controller
{
    //
    public function changepassword()
    {
      
     return view('ChangePassword.changepassword');
    }

    public function updatepassword(Request $request)
    {
        $this->validate(request(), [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'password' => ['required ','min:6'],
            'confirm-password' => 'required|same:password'
        ]);
      
    
        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
        
        return view('Layout.index');
      
        
    }



}
