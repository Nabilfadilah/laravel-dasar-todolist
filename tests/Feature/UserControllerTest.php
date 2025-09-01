<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    // test login page
    public function testLoginPage()
    {
        $this->get('/login')->assertSeeText("Login");
    }

    // test login success
    public function testLoginSuccess()
    {
        $this->post('/login', [
            "user" => "abil",
            "password" => "rahasia"
        ])->assertRedirect("/")->assertSessionHas("user", "abil");
    }

    // test login error
    public function testLoginValidationError()
    {
        $this->post('/login', [])->assertSeeText("User or password is required");
    }

    // test login failed
    public function testLoginFailed()
    {
        $this->post('/login', [
            "user" => "wrong",
            "password" => "wreng"
        ])->assertSeeText("User or password is wrong");
    }

    // test logout
    public function testLogout()
    {
        $this->withSession([
            "user" => "abil"
        ])->post("/logout")->assertRedirect("/")->assertSessionMissing("user");
    }

    // test logout 
    public function testLogoutGuest()
    {
        $this->post("/logout")->assertRedirect("/");
    }

    // test login page untuk member
    public function testLoginPageForMember()
    {
        $this->withSession([
            "user" => "abil"
        ])->get('/login')->assertRedirect("/");
    }

    // test login berhasil, kenapa perlu login lagi
    public function testLoginForUserAlreadyLogin()
    {
        $this->withSession([
            "user" => "abil"
        ])->post('/login', [
            "user" => "abil",
            "password" => "rahasia"
        ])->assertRedirect("/");
    }
}
