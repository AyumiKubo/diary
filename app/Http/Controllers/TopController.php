<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diary;


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

        if (isset($form['photo'])) {
            $path = $request->file('photo')->store('public/photo');
            $diary->photo_path = basename($path);
        } else {
            $diary->photo_path = null;
        }

        unset($form['_token']);
        unset($form['photo']);

        $diary->fill($form);
        $diary->save();
        
        return redirect('diary/index');
    }

    public function index(Request $request)
    {
        $cond_date = $request->cond_date;
        if ($cond_date != '') {
            $posts = Diary::where('date', $cond_date)->get();
        } else {
            $posts = Diary::all();
        }
        return view('diary.index', ['posts' => $posts, 'cond_date' => $cond_date]);
    }

    public function edit(Request $request)
    {
        $diary =  Diary::find($request->id);

        if (empty($diary)) {
            abort(404);
        }

        return view('diary.edit', ['diary_form' => $diary]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Diary::$rules
    );
        $diary = Diary::find($request->id);

        $diary_form = $request->all();
        if ($request->remove == 'ture') {
            $diary_form['photo_path'] = null;
        } elseif ($request->file('photo')) {
            $path = $request->file('photo')->store('public/photo');
            $diary_form['photo_path'] = basename($path);
        } else {
            $diary_form['photo_path'] = $diary->photo_path;
        }
       
        unset($diary_form['photo']);
        unset($diary_form['remobe']);
        unset($diary_form['_token']);
       
        $diary->fill($diary_form)->save();

        return redirect('diary/index');
    }

    public function delete(Request $request)
    {
        $diary = Diary::find($request->id);
        $diary->delete();
        return redirect('/top');


    }

}
