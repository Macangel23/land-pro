<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserAccountController extends Controller
{
   public function create()
   {
      return Inertia::render('UserAccount/Create');
   }

   public function store(Request $request)
   {
      $user = User::create($request->validate([
         'name' => 'required',
         'email' => 'required|string|email|unique:users',
         'password' => 'required|string|min:6|confirmed'
      ]));
      Auth::login($user);

      return redirect()->route('listing.index')
         ->with('success', 'Account Created');
   }
}
