<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Requests\DeletePageRequest;
use App\Http\Controllers\Controller;
use App\Models\Access\User\User;
use App\Models\Page;
use Carbon\Carbon;
use Auth;

class PageController extends Controller
{
    public function index(){

    	$pages = Page::paginate(10);
            foreach ($pages as $page) {
            $page->created_ago=Carbon::createFromTimeStamp(strtotime($page->created_at))->diffForHumans();
        }
    	return view('backend.pages.index')->with(array("pages" => $pages));
    }

    public function create(){
        $users = User::all()->pluck("name","id");
        $pages = Page::all()->pluck("title", "id");

        return view("backend.pages.create")->with(array("users"=>$users, "pages"=>$pages));
    }

    public function store(CreatePageRequest $request){

    	$data = $request->all();
        $pages = Page::create($data);
        $request->session()->flash('alert-success','User was successfully');
         return redirect(route('admin.pages.index'));

    }

     public function edit($id){
        $pages = Page ::find($id);
         if(!$pages){
            abort(404);
         }
         return view('backend.pages.edit')->with(array(
            "pages" => $pages));
    }

     public function update($id , UpdatePageRequest $request){
         $data = $request->all();
         $pages = Page ::find($id);
          if(!$pages){
            abort(404);
        }
  $page->title = $data['title'];
        $page->slug = $data['slug'];
        $page->description = $data['description'];
        $page->save();
        return redirect(route('admin.pages.index'));
        //  $pages->update($data); 

        // return redirect()->back()->with("flash_success","Update successfully");
    }

     public function destroy($id ,DeletePageRequest $request){
         $data = $request->all();
        $pages = Page :: find($id);
        $pages->delete();
        return redirect(route('admin.pages.index'))->with("flash_success","Delete successfully");


        
    }
}
