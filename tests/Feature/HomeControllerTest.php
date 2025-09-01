<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    // test page guest
    public function testGuest()
    {
        $this->get('/')->assertRedirect('/login');
    }

    // test page member
    public function testMember()
    {
        $this->withSession([
            "user" => "abil"
        ])->get('/')->assertRedirect('/todolist');
    }
}
