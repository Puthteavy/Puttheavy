<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Contents;
use App\Post_Category;
use Image;


class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    public function getJson(Request $request)
    {
        $q = $request->get('q');

        if($q != null)
        {
            $data = Contents::where('title','LIKE',"%{$q}%")
                ->orWhere('cover','LIKE',"%{$q}%")
                ->orderBy('id','desc')
                ->get();
        }
        else
        {
            $data = Contents::where('category_id','1')->orderBy('id','desc')->get();
        }

    	return response()->json($data);
    }

    public function getEnglish(Request $request)
    {
        $q = $request->get('q');

        if($q != null)
        {
            $data = Contents::where('title','LIKE',"%{$q}%")
                ->orWhere('cover','LIKE',"%{$q}%")
                ->orderBy('id','desc')
                ->get();
        }
        else
        {
            $data = Contents::where('category_id','2')->orderBy('id','desc')->get();
        }

        return response()->json($data);
    }

    public function getDrink()
    {
      $data = Contents::where('category_id','3')->orderBy('id','desc')->get();
      return response()->json($data);
    }

    public function getSearch(Request $request)
    {
        $q = $request->get('q');
        if($q != null)
        {
            $data = Contents::where('title','LIKE',"%{$q}%")
                              ->orWhere('cover','LIKE',"%{$q}%")
                              ->orderBy('id','desc')
                              ->get();
            return response()->json($data);
        }
        else
        {
            echo "No data";
        }

    }

    public function getDashboard()
    {
        return view('admin.dashboard');
    }

    public function createPage(Request $request)
    {
        $q = $request->get('q');

        if($q != null)
        {
            $content = Contents::where('title','LIKE',"%{$q}%")
                ->orWhere('cover','LIKE',"%{$q}%")
                ->orderBy('id','desc')
                ->paginate(8);
            //$content->appends(['q' => $q]);
        }
        else
        {
            $content = Contents::orderBy('id','desc')->paginate(8);
        }

        return view('admin.createPage',compact('content'));
    }

    public function getFormcontent()
    {
        $category = Category::all();
    	return view('admin.formcontent',compact('category'));
    }

    public function saveContent(Request $request)
    {
        /*$this->validate($request,[
            'title'        =>   'required',
            'cover'        =>   'required',
            'image'        =>   'image|mimes:jpg,png,gif',
            'description'  =>   'required',
        ]);*/

        $img_url = '';
        if($request->image != null) {
            $imagepath = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images/'), $imagepath);
            $img_url = $imagepath;

            $data = array(
                'title' => $request['title'],
                'cover' => $request['cover'],
                'image' => $img_url,
                'description' => $request['description'],
                'category_id' => $request['category_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            );

            $i = Contents::insert($data);
            if ($i > 0) {
                //$this->alert()->success('You have been add successfully.', 'Good bye!');
                return redirect('dashboard');
            }
        }
        return redirect()->back();

        //insert ajax
        /*$data = array(
            'title' => $request['title'],
            'cover' => $request['cover'],
            'description' => $request['description'],
            'category_id' => $request['category_id'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        );

        Contents::insert($data);
        if($request->ajax())
        {
            return response()->json(['xx' => 1]);
        }*/

    }

    public function getDelete($id)
    {
    	$db = Contents::where('id',$id)->first();
    	$unlink = unlink('images/'.$db->image);
    	if($unlink)
    	{
    		$i = Contents::where('id',$id)->delete();
    		if($i > 0)
    		{
    			\Session::flash('message','Record remove successfully.');
    		}
    	}
    	return redirect()->back();
    }

    public function getUpdate($id)
    {
        $row = Contents::where('id',$id)->first();
        return view('admin.formupdatecontent',compact('row'));
    }
    
    public function postUpdate(Request $request)
    {
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
                'cover'       =>  $request->input('cover'),
                'image'       =>  $img_url,
                'description' =>  $request->input('description'),
            ];

            if($img_url == '')
            {
               unset($data['image']);
            }

            Contents::where('id',$id)->update($data);
            return redirect('dashboard');
    }
    
    public function getCategory()
    {
        return view('admin.postcategory',['category' => $this->getPost_Category()]);
    }

    private function getPost_Category($parent_id = 0)
    {
        $row1 = Post_Category::where('parent_id',$parent_id)->get();
        $html1 = '';
        $html2 = '';

        if($row1->count() > 0)
        {
            foreach($row1 as $row1s)
            {
                $row2 = Post_Category::where('parent_id',$row1s->id)->get();

                if($row2->count() > 0) //is parent have child
                {
                    $html2 .= '<h3 class="text-light-gray" style="margin-left:10px;">&nbsp;'.$row1s->category_name.'</h3>';
                    $html2 .= $this->getPost_Category($row1s->id);
                }
                else // no child
                {
                    $html1 .= '<div class="checkbox-inline checkbox-success">
                               <input type="checkbox" value="'.$row1s->id.'" name="category_id['.$row1s->id.']">
                               <span for="checkbox">'.$row1s->category_name.'</span>
                               </div>';
                }
            }
        }
        return $html1 .'<br>'. $html2;
    }
}
