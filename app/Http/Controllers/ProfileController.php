<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        if (isset($form['photo'])) {
            $path = $request->file('photo')->store('public/photo');
            $profile->photo_path = basename($path);
        } else {
            $profile->photo_path = null;
        }

        unset($form['_token']);
        unset($form['photo']);

        $profile->fill($form);
        $profile->save();

        return redirect('top');
    }

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function edit($id)
    {
        $profile = $this->profile->selectProfileFindById($id);

        return view('profile.edit', ['profile_form' => $profile]);
    }

    public function update()
    {
        return redirect('profile/edit');
    }

    public function index()
    {
        $profile = Auth::profile();
        return view('profile.myprofile', ['profile_form' => $profile]);
    }
}
