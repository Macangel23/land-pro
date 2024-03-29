<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
   public function index()
   {
      return Inertia::render('Index/Index',[
         'message' => 'Hello Meow'
      ]);
   }
   public function show()
   {
      return Inertia::render('Index/Show');
   }
}
