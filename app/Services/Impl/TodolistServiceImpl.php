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

    // ambil todo
    public function getTodolist(): array
    {
        return Session::get("todolist", []);
    }

    // remove todo
    public function removeTodo(string $todoId)
    {
        $todolist = Session::get("todolist");

        // ambil dari todolist 
        foreach ($todolist as $index => $value) {
            // cek kalau value idnya sama dengan todoid nya
            if ($value['id'] == $todoId) {
                // maka hapus todolist index nya(id)
                unset($todolist[$index]);
                break;
            }
        }

        // simpan lagi sessionnya ke todolist dan makukan lagi data todolist
        Session::put("todolist", $todolist);
    }
}
