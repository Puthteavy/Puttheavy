<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    function getCategory(){
        $category = Category::orderby('id','desc')->paginate(5);
        return view('Admin.category.category',['category'=>$category]);

    }
    function formCategory(Request $request){
        $category = Category::all();
        return view('Admin.category.category',['category'=>$category]);
    }
    function saveCategory(Request $request){
        $category = new Category(); // instant new class
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;

        $category->save();
        //$article->create($request->all()); // save to db
        return redirect('admin/category');
    }
    function editCategory($id){

        $category = Category::findOrFail($id);
        return view('Admin.category.editCategory')->with('category',$category);
    }
    function saveUpdateCategory(Request $request,$id){

        $category = Category::findOrFail($id);
        $this->validate($request ,[
            'category_name'=>'required|max:255|min:3|unique:categories,category_name,'.$category->id.',id',
            'category_slug'=>'required|min:1',
        ]);
        $category->update($request->all());
        return redirect('admin/category');
    }
    function getDelete(Request $request,$id){
        $category = Category::findOrFail($id);

        $category->delete($request->all());
        return redirect('admin/category');
    }
}
