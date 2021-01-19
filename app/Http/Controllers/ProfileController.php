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
