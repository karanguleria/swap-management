<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class loginController extends Controller
{
   public function login(REQUEST $request){
      //sdd($request->all());
       if(Auth::attempt([
           'email' => $request->email,
           'password' => $request->password
        
       ]))
       {
       $user = User::where('email',$request->email)->first();
         if($user->is_admin())
         {
             return redirect()->route('dashbord');
         }
         return redirect()->route('home');
       }
         return redirect()->back();
   }
}
