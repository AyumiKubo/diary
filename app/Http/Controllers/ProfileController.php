<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    public function add()
    {
        return view('profile.create');
    }
    
    public function create()
    {
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

        if (isset($form['iamge'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        unset($form['_token']);
        unset($form['image']);

        $profile->fill($form);
        $profile->save();

        return redirect('profile/create');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update()
    {
        return redirect('profile/edit');
    }
}
