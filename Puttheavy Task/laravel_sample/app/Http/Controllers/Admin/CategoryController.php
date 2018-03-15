<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Category;
use App\Models\Admin\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    function getCategory(){
        $category = Category::orderby('id','desc')->paginate(5);
        return view('Admin.category.category',['category'=>$category]);
    }

    function formCategory(){
        $category = Category::all();
        return view('Admin.category.category',['category'=>$category]);
    }
    function saveCategory(Request $request){
        $category = new Category(); // instant new class
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;
        $category->description = $request->description;

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
            'description' => 'required',
        ]);
        $category->update($request->all());
        return redirect('admin/category');
    }
    function getDelete(Request $request,$id){

        $category = Category::findOrFail($id);

        $category->delete($request->all());
        return redirect('admin/category');
    }
//    =================================
        function subCategory(){
        $item = PostCategory::orderby('id','desc')->paginate(5);
        return view('Admin.category.subcategory',['item'=>$item]);
            //return view('Admin.category.category',['category' => PostCategory::getCategoryOption()]);
            //return '<select>'.PostCategory::getCategoryOption().'</select>';
        }
    function getCategoryOption($select = 0 , $parent_id = 0){

        $row1 = PostCategory::where('parent_id',$parent_id)->get();
        $html1 = '';
        if(count ($row1) > 0){

            foreach ($row1 as $row1s){
                $row2 = PostCategory::where('parent_id',$row1s->id)->get();
                $selected = $select == $row1s->id ? 'selected="selected"' : '';

                if(count ($row2) > 0){
                    $html1 .='<option value="'.$row1s->id.'">'.$row1s->category_name.'</option>';//parent
                    $html1 .= $this->getCategoryOption($row1s->id);//child


                }else{
                    $html1 .='<option value="'.$row1s->id.'">'.$row1s->category_name.'</option>';//parent
                }
            }

        }
        return $html1;
    }

}
