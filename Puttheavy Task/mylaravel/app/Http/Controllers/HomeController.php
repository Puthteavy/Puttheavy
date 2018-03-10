<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    function index(){
        return "Welcome to my index page";
    }
    //access to view
    function about()
    {
//      return view('template.about');
        // pass date from controller to view
        $name = 'Puttheavy tep';
        $names ='<p>Puttheavy teps</p>';
        //return view('template.about')->with('data',$name);
        //date is key
        //or
       //return view('template.about', ['data' => $names]);



       $data = [];
       $data['name'] = 'Tep Puttheavy';
       $data['number'] =['one','two','three'];
       return view('template.about')->with($data);

    }
}
