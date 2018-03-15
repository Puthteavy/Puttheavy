<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    //
    public function getDashboard(){
        return view('Admin.post.dashboard');
    }
    public function getPost(){
        $post = Post::orderby('id','desc')->paginate(5);
        return view('Admin.post.post',compact('post'));
    }


    public function addNew(){

        $getCategory = Category::all();
        return view('Admin.post.add_new',['getCategory'=>$getCategory]);
    }
    function savePost(Request $request){

        if($request->image != null) {
            $imagepath = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/'), $imagepath);
            $img_url = $imagepath;

            $data = array(
                'title' => $request['title'],
                'category_id' => $request['category_id'],
                'description' => $request['description'],
                'image' => $img_url,
                'content' => $request['content'],

            );

            $i = Post::insert($data);
            if ($i > 0) {

                return redirect('admin/post');
            }
        }
        return redirect()->back();
    }
    function editPost($id){
        $post = Post::findOrFail($id);
        return view('Admin.post.editPost')->with('post',$post);
    }
    function saveUpdate(Request $request,$id){
        $img_url = '';
        if($request->image != null)
        {
            $imagepath = time(). '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/'), $imagepath);
            $img_url = $imagepath;
        }
        $id = $request->input('id');
        $data = [

            'title'       =>  $request->input('title'),
            'description' =>  $request->input('description'),
            'image'       =>  $img_url,
            'content' =>  $request->input('content'),
        ];
        if($img_url == '')
        {
            unset($data['image']);
        }

        Post::where('id',$id)->update($data);
        return redirect('/admin/post');
    }
    function getDeletePost(Request $request,$id){

        $post = Post::findOrFail($id);

        $post->delete($request->all());
        return redirect('admin/post');
    }

}
