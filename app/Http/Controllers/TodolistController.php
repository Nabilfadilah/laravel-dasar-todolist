<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodolistController extends Controller
{
    // menampilkan halaman todo
    public function todoList(Request $request) {}

    // menambah todo
    public function addTodo(Request $request) {}

    // remove todo
    public function removeTodo(Request $request, string $todoId) {}
}
