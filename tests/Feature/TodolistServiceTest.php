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
    // public function testSaveTodo()
    // {
    //     $this->todolistService->saveTodo("1", "Nabil");

    //     // ambil dari session
    //     $todolist = Session::get("todolist");
    //     foreach ($todolist as $value) {
    //         self::assertEquals("1", $value["id"]);
    //         self::assertEquals("Abil", $value["todo"]);
    //     }
    // }

    // get todolist kosong
    public function testGetTodolistEmpty()
    {
        // harus kosong, sebelum ditambah
        self::assertEquals([], $this->todolistService->getTodolist());
    }

    // get todolist tidak boleh kosong
    public function testGetTodolistNotEmpty()
    {
        // pastikan datanya dari todolist
        $expected = [
            [
                "id" => "1",
                "todo" => "Nabil"
            ],
            [
                "id" => "2",
                "todo" => "Fadilah"
            ],
        ];

        $this->todolistService->saveTodo("1", "Nabil");
        $this->todolistService->saveTodo("2", "Fadilah");

        // ekpektasi
        self::assertEquals($expected, $this->todolistService->getTodolist());
    }
}
