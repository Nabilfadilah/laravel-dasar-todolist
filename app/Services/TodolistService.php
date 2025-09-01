<?php

namespace App\Services;

interface TodolistService
{

    // save/add todo list
    public function saveTodo(string $id, string $todo): void;

    // mengambil todo
    public function getTodolist(): array;

    // hapus todo
    public function removeTodo(string $todoId);
}
