<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\DeleteCategoryRequest;

use App\Http\Controllers\Controller;
use App\Models\Category;

use App\Models\Access\User\User; 
use Auth;
use Image;

class CategoryController extends Controller
{
    public function index(){
        
    	$category = Category::paginate(10);
    	return view('backend.category.index')->with(array("category" => $category));
    }

    public function create(){
        $parent_id = Category::all()->pluck("title","id")->toArray();
        return view('backend.category.create')->with(array("parent_id" => $parent_id));
    }
    public function store(CreateCategoryRequest $request){

        $data = $request->all();
        $data["category"] = Auth::user()->id;
    
        $img =Image::make($_FILES['image']['tmp_name']);
        $img->resize(800,640);
        $img_name=time().".jpg";
        $img->save(public_path("upload/categories/".$img_name));
        $data["icon_image"] = $img_name;

        $category = Category::create($data);
        //Flash::success ("project created successfully!");
        return redirect(route('admin.categories.index'));

    }
    public function edit($id){
        $category = Category ::find($id);
         if(!$category){
            abort(404);
         }
         $parent_id = Category::all()->pluck("title","id")->toArray();
         return view('backend.category.edit')->with(array(
            "category" => $category,
            "parent_id" => $parent_id,));
    }
    public function update($id , UpdateCategoryRequest $request){
         $data = $request->all();
         $category = Category ::find($id);
          if(!$category){
            abort(404);
        }

         $category->update($data); 

    	return redirect()->back()->with("flash_success","Update successfully");
    }
   


    public function destroy($id , DeleteCategoryRequest $request){
    	 $data = $request->all();
        $category = Category :: find($id);

        if(!$category){
            return redirect(route('admin.categories.index'))->with("flash_success","Not Found");
        }
        $category->delete();

        return redirect(route('admin.categories.index'))->with("flash_success","Delete successfully");
    }

    public function show(){
        return redirect(route('admin.categories.index'));
    }
  
}
