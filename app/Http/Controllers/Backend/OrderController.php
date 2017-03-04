<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\DeleteOrderRequest;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Access\User\User; 
use Auth;

class OrderController extends Controller
{
    public function index(){

        $orders=Order::join("users","users.id","=","orders.customer_id")
             ->select("orders.*","users.name AS customer_id")
             ->paginate(10);
        return view('backend.order.index')->with(array("orders" => $orders));
    }

    public function create(){
        $customer_id = User::all()->pluck("name","id");
        $products = Product::all()->pluck("title","id");
        return view('backend.order.create')
        ->with(array(
            "customer_id" => $customer_id,
            "products" => $products,
            )
            );
    }
    public function store(CreateOrderRequest $request){

        $data = $request->all();
        $data["user_id"] = Auth::user()->id;
        $order = Order::create($data);
        $products = $data["products"];
        //dd($products);
        if(is_array($products)){
            foreach ($products as $product) {
               OrderItem::create(
                [
                "order_id" => $order->id,
                "product_id" => $product,
                "order_item_amount" => 0]
                ) ;
            }
        }
        //Flash::success ("project created successfully!");
        return redirect(route('admin.orders.index'));

    }
   
    public function edit($id){
        $order = Order ::find($id);
         if(!$order){
            abort(404);
         }
         $customer_id = User::all()->pluck("name","id");
         $product_id = Product::all()->pluck("title","id");
         return view('backend.order.edit')->with(array(
            "order" => $order,
            "customer_id" => $customer_id,
            "product_id" => $product_id,));
    }
    public function update($id , UpdateOrderRequest $request){
         $data = $request->all();
         $order = Order ::find($id);
          if(!$order){
            abort(404);
        }

         $order->update($data); 

    	return redirect()->back()->with("flash_success","Update successfully");
    }
   


    public function destroy($id , DeleteOrderRequest $request){
    	 $data = $request->all();
        $order = Order :: find($id);

        if(!$order){
            return redirect(route('admin.orders.index'))->with("flash_success","Not Found");
        }
        $order->delete();

        return redirect(route('admin.orders.index'))->with("flash_success","Delete successfully");
    }

    public function show($id){
         $order = Order ::find($id);

         $order_items = OrderItem :: join ("products","products.id","=","order_items.product_id")
                 ->join("orders","orders.id","=","order_items.order_id")
                 ->join("users","users.id","=","orders.customer_id")
                 ->select("order_items.*","users.name AS customer_id","products.title AS product_id","products.price AS product_price","orders.order_amount AS order_amount")
                 ->paginate(10);

          if(!$order){
            abort(404);
        }

        return view('backend.order.show')->with(array("order_items" => $order_items));
    }
  
}
