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
}
