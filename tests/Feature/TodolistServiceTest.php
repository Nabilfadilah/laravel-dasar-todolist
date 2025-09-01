<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
}
