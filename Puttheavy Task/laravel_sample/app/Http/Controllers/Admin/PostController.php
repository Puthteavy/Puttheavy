<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function getPost(){
        return view('Admin.post.post');
    }
    public function getDashboard(){
        return view('Admin.post.dashboard');
    }

    public function addNew(){
        return view('Admin.post.add_new');
    }


}
