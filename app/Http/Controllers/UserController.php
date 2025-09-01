<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // dependensi injection
    private UserService $userService;
    // pake controller construct
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // login page
    public function login(): Response
    {
        // kembalikan view login
        return response()->view("user.login", ["title" => "Login"]);
    }

    // aksi untuk login
    public function doLogin(Request $request): Response|RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // validate cek input
        if (empty($user) || empty($password)) {
            return response()->view("user.login", [
                "title" => "Login",
                "error" => "User or password is required"
            ]);
        }

        // kalau user service login usernya true
        if ($this->userService->login($user, $password)) {
            // berti sukses
            $request->session()->put("user", $user);
            return redirect("/");
        }

        // kalau loginnya gagal
        return response()->view("user.login", [
            "title" => "login",
            "error" => "User or password is wrong"
        ]);
    }

    // logout
    public function doLogout() {}
}
