<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function add()
    {
        return view('diary.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Diary::$rules);

        $diary = new Diary;
        $form = $request->all();

        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $diary->image_path = basename($path);
        } else {
            $diary->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $diary->fill($form);
        $diary->save();
        
        return redirect('diary/create');
    }

    public function index(Request $request)
    {
        $cond_date = $request->cond_dates;
        if ($cond_date != '') {
            $posts = Diary::where('date', $cond_date)->get();
        } else {
            $posts = Diary::all();
        }
        return view('diary.index', ['posts' => $posts, 'cond_date' => $cond_date]);
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
