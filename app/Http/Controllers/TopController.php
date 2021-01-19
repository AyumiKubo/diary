<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function add()
    {
        return view('diary.create');
    }

    public function create()
    {
        return redirect('diary/create');
    }

    public function edit()
    {
        return view('diary.edit');
    }

    public function update()
    {
        return redirect('diary/edit');
    }
}
