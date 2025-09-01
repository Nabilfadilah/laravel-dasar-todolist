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

    // add todo failed
    public function testAddTodoFailed()
    {
        $this->withSession([
            "user" => "abil"
        ])->post("/todolist", [])->assertSeeText("Todo is required");
    }

    // add todo success
    public function testAddTodoSuccess()
    {
        $this->withSession([
            "user" => "abil"
        ])->post("/todolist", [
            "todo" => "Fadilah"
        ])->assertRedirect("/todolist");
    }

    // remove todo
    public function testRemoveTodoList()
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
        ])->post("/todolist/1/delete")->assertRedirect("/todolist");
    }
}
