<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
        $this->todolistService = $todolistService;
    }

    // menampilkan halaman todo
    public function todoList(Request $request)
    {
        // ambil dari todolist service
        $todolist = $this->todolistService->getTodolist();

        return response()->view("todolist.todolist", [
            "title" => "Todolist",
            "todolist" => $todolist
        ]);
    }

    // menambah todo
    public function addTodo(Request $request)
    {
        $todo = $request->input("todo");

        if (empty($todo)) {
            // ambil dari todolist service
            $todolist = $this->todolistService->getTodolist();

            return response()->view("todolist.todolist", [
                "title" => "Todolist",
                "todolist" => $todolist,
                "error" => "Todo is required"
            ]);
        }

        $this->todolistService->saveTodo(uniqid(), $todo);

        return redirect()->action([TodolistController::class, 'todoList']);
    }

    // remove todo
    public function removeTodo(Request $request, string $todoId) {}
}
