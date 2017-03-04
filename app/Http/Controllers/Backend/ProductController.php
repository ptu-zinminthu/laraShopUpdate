<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProductRequest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Access\User\User; 
use Auth;
use Image;
use Carbon\Carbon;
class ProductController extends Controller
{
    public function index(){

    // $products=Product::join("categories","categories.id","=","products.category_id")
    //          ->select("products.*","categories.title AS category_id")
    // 	     ->paginate(10);
    // 	return view('backend.product.index')->with(array("products" => $products));
   $products = Product::join("users", "users.id", "=", "products.user_id")
        ->join("categories", "categories.id", "=", "products.category_id")
        ->leftJoin("brands","brands.id","=","products.brand_id");
       
        $products = $products->select("products.*", "users.name AS user", "categories.title AS category","brands.name As brand")
        ->orderBy("products.created_at","DESC")
        ->paginate(5);

        foreach($products as $product){
            $product->created_ago = Carbon::createFromTimeStamp(strtotime($product->created_at))->diffForHumans();
        }

        return view('backend.product.index')->with(array("products"=>$products));
    }


    public function create(){
        $users = User::all()->pluck("name","id");
        $parent_id = User::all()->pluck("name","id");
         $category_id = Category::all()->pluck("title","id");
         $brands = Brand::all()->pluck("name",'id');
        return view('backend.product.create')
        ->with(array(
            "parent_id" => $parent_id,
             "category_id" => $category_id,
             "brands"=>$brands
            )
            );

// $users = User::all()->pluck("name","id");
//         $categories = Category::all()->pluck("title", "id");
//         $brands = Brand::all()->pluck("name",'id');

//         return view("backend.products.create")->with(array("users"=>$users, "categories"=>$categories,"brands"=>$brands));



    }

    public function store(CreateProductRequest $request){

        $data = $request->all();
         $data["user_id"] = Auth::user()->id;

        $img =Image::make($_FILES['product_img']['tmp_name']);
        $img->resize(60,50);
        $img_name=time().".jpg";
        $img->save(public_path("upload/products/".$img_name));
        $data["image"] = $img_name;


         $product = Product::create($data);
        //Flash::success ("project created successfully!");
        return redirect(route('admin.products.index'));
    }


    public function edit($id){
        $product = Product ::find($id);
         if(!$product){
            abort(404);
         }
         $users = User::all()->pluck("name", "id");
         $parent_id = User::all()->pluck("name","id");
         $category_id = Category::all()->pluck("title","id");
        $brands = Brand::all()->pluck("name","id");
         return view('backend.product.edit')->with(array(
            "product" => $product,
            "users"=>$users,
            "category_id" => $category_id,
            "parent_id" => $parent_id,
             "brands"=>$brands));
    }

    public function update($id , UpdateProductRequest $request){
         $data = $request->all();
         $product = Product ::find($id);
          if(!$product){
            abort(404);
        }

         if(!empty($_FILES['image']['name'])){
            $img = Image::make($_FILES['product_img']['tmp_name']);

            $img->resize(800, 640);
            $img_name = time().".jpg";
            $img->save(public_path("upload/products/".$img_name));

            $data["image"] = $img_name;
        }

         $product->update($data); 

    	return redirect()->back()->with("flash_success","Update successfully");
    }

    public function destroy($id , DeleteProductRequest $request){
    	 $data = $request->all();
        $product = Product :: find($id);
        $product->delete();
        return redirect(route('admin.products.index'))->with("flash_success","Delete successfully");
    }

    public function show(){
        return redirect(route('admin.products.index'));
    }
  
}
