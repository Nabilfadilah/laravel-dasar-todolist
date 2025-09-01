<?php

namespace App\Services\Impl;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{
    // save todo list
    public function saveTodo(string $id, string $todo): void
    {
        // simpan data di session
        // ada gak data todolist di session?
        if (!Session::exists("todolist")) {
            // kalau tidak ada, buat data todo list baru, dengan array kosong!
            Session::put("todolist", []);
        }

        // unutuk memasukan data kedalam array di atas
        Session::push("todolist", [
            "id" => $id,
            "todo" => $todo
        ]);
    }
}
