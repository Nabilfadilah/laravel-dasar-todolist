<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // home page
    public function home(Request $request): RedirectResponse
    {
        // kalau request session excis data usernya 
        if ($request->session()->exists("user")) {
            // atau sudah login, maka redirect ke todolist
            return redirect("/todolist");
        } else {
            // kalau belom login, arahkan ke login 
            return redirect('/login');
        }
    }
}
