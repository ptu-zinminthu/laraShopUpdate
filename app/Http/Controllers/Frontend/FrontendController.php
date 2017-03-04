<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMessageRequest;
use App\Models\Category;
use App\Models\Product;
use Input;
use Mail;

/**
 * Class FrontendController
 * @package App\Http\Controllers
 */
class FrontendController extends Controller
{
	/**
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		//$categories = Category::where("parent_id",0)->get();
		$products = Product::where("category_id",13)->get();
		$offer_products = Product::where("category_id",35)->get();
		$vegitable_products = Product::where("category_id",33)->get();
		$beverage_products =  Product::where("category_id",32)->get();
		return view('frontend.index')->with(array("products"=>$products,"vegitable_products"=>$vegitable_products,
			"beverage_products" =>$beverage_products,
			"offer_products" =>$offer_products
			));
	}

	public function products(){


		// $categories = Category::where("parent_id",0)->get();// is for sidebar category list
		 $category_id = Input::get("category"); // is for sidebar Url link (start)
		 $category = null;
		 $category = Category::find($category_id);

		$keyword = Input::get('q');
		$products = Product::join("categories","categories.id","=","products.category_id");

		if($category){
			$products =$products->where("products.category_id",$category_id);
		}		  
		if($keyword){
			$products = $products->where("products.title","like","%".$keyword."%");
		}
		$products = $products->orderBy("products.created_at","DESC")
							->select("products.*","categories.title AS category_id")
							->paginate(16);

		return view('frontend.products.index')->with(array(
	 		"category"=>$category,
	 		"category_id"=>$category_id,
	 		"products" => $products,
	 		 ));



		//  if($category){
		// 	$products = Product::where("category_id",$category->id)->paginate(16);
		// } else{
		// 	$products= Product::paginate(10);
		// }

		//(end)

	

  //       $products=Product::join("categories","categories.id","=","products.category_id")
  //            ->select("products.*","categories.title AS category_id")
  //   	     ->paginate(10);
  //   	return view('frontend.products.index')->with(array("categories"=>$categories,"products" => $products));
		
	}

	/**
	 * @return \Illuminate\View\View
	 */
	
	public function services()
	{
		$categories = Category::where("parent_id",0)->get();
		return view('frontend.services')->with(array(
			"categories"=>$categories));
	}
	public function event()
	{
		$categories = Category::where("parent_id",0)->get();
		return view('frontend.event')->with(array(
			"categories"=>$categories));
	}
	public function about()
	{
		$categories = Category::where("parent_id",0)->get();
		return view('frontend.about')
		->with(array(
			"categories"=>$categories));
	}
	public function mail()
	{
		$categories = Category::where("parent_id",0)->get();
		return view('frontend.mail')
		->with(array(
			"categories"=>$categories));
	}
	
	public function productdetails($id)
	{
		$product = Product::join("users", "users.id", "=", "products.user_id")
        ->join("categories", "categories.id", "=", "products.category_id")
        ->leftJoin("brands","brands.id","=","products.brand_id")
       ->where("products.id",$id)
    	->select("products.*", "users.name AS user", "categories.title AS category","brands.name As brand")        
        ->first();

		if(!$product)
		{
			abort(404);

		}
		return view("frontend.products.detail")
		->with(array("product"=>$product));
	}

public function contact()
	{
	
		return view("frontend.contact-us");
	}

	public function sendmessage(SendMessageRequest $request)
	{
		$data = $request->all();
		//dd($data);
		
		Mail::send("frontend.emails.contact-message", $data,
			function ($message){
				$recept = "zinminthu.it@gmail.com";
				$message -> to($recept);
				$message -> subject("Message From LaraShop");
			}
			);
	}

	
}
