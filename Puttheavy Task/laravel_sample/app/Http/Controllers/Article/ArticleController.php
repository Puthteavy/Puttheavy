<?php

namespace App\Http\Controllers\Article;

use App\ArticleModel\article;
use App\Http\Requests\CreateArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth',['only'=>'create']);
    }

    function index(){
//        $user = Auth::user();
//        $articles = $user->articles;
//        dd($articles->toArray());

       $article = article::orderby('id','desc')->paginate(10);
       return view('Article.article',['article'=>$article]);


    }
    function form(){

        return view('Article.form');

    }
    function store(CreateArticleRequest $request){
        //get request from form
        // save to database

//        $this->validate($request ,[
//            'title'=>'required|max:255|min:3',
//            'body'=>'required|min:5',
//            'active'=>'required|min:1'
//        ]);

        //check if user not login

        if(Auth::check() == false){
            redirect('login');
        }
        $user = Auth::user();

        $article = new article(); // instant new class
        //same to fillable
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = $user->id; // only user id = 1 can add




        if ($request->active != null){
            $article->active = $request->active;
        }else{
            $article->active = 0;
        }


        $article->save();
       // $article->create($request->all()); // save to db
        return redirect('article/article');
    }
    function show($id){
        $article = article::findOrFail($id);
       return view('Article.show')->with('article',$article);

    }
    function edit($id){
      $article = article::findOrFail($id);
      return view('Article.edit')->with('article',$article);
    }
    function update(Request $request,$id){

        $article = article::findOrFail($id);
        $this->validate($request ,[
            'title'=>'required|max:255|min:3|unique:articles,title,'.$article->id.',id',
            'body'=>'required|min:5',
            'active'=>'required|min:1'
        ]);
        $article->update($request->all());
        return redirect('article/article');
    }
    function delete($id){
        $article = article::findOrFail($id);


        $article->destroy($article->all());

        return redirect('article/article');



    }


}
