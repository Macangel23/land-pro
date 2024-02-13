<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AuthController extends Controller
{
   public function create()
   {
      return Inertia::render('Auth/Login');
   }

   public function store(Request $request)
   {
      if(!Auth::attempt($request->validate([
         'email' => 'required|string|email',
         'password' => 'required|string|min:6'
      ]))){
         throw ValidationException::withMessages([
            'email' => 'Authentication error'
         ]);
      }

      // regenerate session to avoid using of session id to other browsers
      $request->session()->regenerate();
      return redirect()->intended('/listing');
   }

   public function destroy(Request $request)
   {
      Auth::logout();

      $request->session()->invalidate();
      $request->session()->regenerate();

      return redirect()->route('listing.index');
   }
}
