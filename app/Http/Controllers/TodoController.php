<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function showTodo()
    {
        return view('admin.todolist.todolist');
    }
}
