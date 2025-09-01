<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistControllerTest extends TestCase
{
    public function testTodoList()
    {
        // tambah session karena harus login
        $this->withSession([
            "user" => "abil",
            "todolist" => [
                [
                    "id" => "1",
                    "todo" => "Abil"
                ]
            ]
        ])->get('/todolist')->assertSeeText("1")->assertSeeText("Abil");
    }
}
