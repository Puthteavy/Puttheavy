<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    // action of controller
    function __construct()
    {

    }

    function index(){
        // list to view all item after save


       //$result = Post::paginate(1);
       $result = Post::orderby('id','DESC')->paginate(5);
       // return view('Admin.post.index',['result'=>$result]);
        return response()->json($result); // ajax and get data ask json
    }
    function form(Request $request){
        //design form , insert and edit
       // request
        $category = Post::all();
        return view('Admin.post.form',compact('category'));



    }
    function edit(){
        return view('Admin.post.form');

    }
    function save(Request $request){
        //insert and update
        // accept
        $post = new Post(); // model = table
        // form = ajax
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        if($post->save()){

            return response()->json($post);

        }else{
            return response()->json(['error'=>1]);
        }

    }
    function delete(){
        //delete
    }
}
