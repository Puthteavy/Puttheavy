<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use Illuminate\Http\Request;
use App\article;
//import model to controller mean for point to table
class ArticleController extends Controller
{
    //call to table record to controller
    function index(){
        //return as json view
        //return article::all();
        //$article = article::all();
        // orderby
        //$article = article::orderBy('article_id','DESC')->get();
        $article = article::Elequend();
        return view('article.index')->with('article',$article);
    }
    public function show($id){
       // $articles = article::find($id);

        $articles = article::findOrFail($id);
       //$articles = article::where('article_id',$id)->first();
        return view('article.show',['article'=>$articles]);
        //dd($articles);
    }
    public function create(){
        return view('article.create');
    }
    public function store(CreateArticleRequest $request){
        //dd($request);


//        //validation
//        $this->validate($request,[
//           'name'=> 'required',
//            //'article_id' => 'required',
//        ]);


        $article = new article();
        //$article->create($request->all());

        $article->article_id = $request->article_id;
        $article->name = $request->name;
        $article->save();

        return redirect('article');

    }

    public function edit($id){
       $article = article::findOrFail($id);
        //even can find the $id , we can edit it.
        //dd($article);
        return view('article.edit')->with('article',$article);

    }


}
