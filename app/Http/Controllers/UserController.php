<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // login page
    public function login(): Response
    {
        // kembalikan view login
        return response()->view("user.login", ["title" => "Login"]);
    }

    // aksi untuk login
    public function doLogin() {}

    // logout
    public function doLogout() {}
}
