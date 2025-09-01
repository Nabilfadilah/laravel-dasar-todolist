<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Session;

class TodolistServiceTest extends TestCase
{
    // memastikan apakah service provider ada?
    private TodolistService $todolistService;

    // buat setup
    protected function setUp(): void
    {
        parent::setUp();

        $this->todolistService = $this->app->make(TodolistService::class);
    }

    // cek apakah ada todolist?
    public function testTodolistNotNull()
    {
        self::assertNotNull($this->todolistService);
    }

    // test save todo
    public function testSaveTodo()
    {
        $this->todolistService->saveTodo("1", "Nabil");

        // ambil dari session
        $todolist = Session::get("todolist");
        foreach ($todolist as $value) {
            self::assertEquals("1", $value["id"]);
            self::assertEquals("Abil", $value["todo"]);
        }
    }
}
