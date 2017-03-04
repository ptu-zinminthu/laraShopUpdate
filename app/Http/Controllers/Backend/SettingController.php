<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Http\Requests\DeleteSettingRequest;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Access\User\User; 
use Auth;

class SettingController extends Controller
{
    public function index(){

    	$settings = Setting::paginate(10);
    	return view('backend.setting.index')->with(array("settings" => $settings));
    }

    public function create(){

    	//$setting = User::all()->pluck("name","id");
        return view('backend.setting.create');
    }
    public function store(CreateSettingRequest $request){

        $data = $request->all();
       // $data["setting"] = Auth::user()->id;
        $settings = Setting::create($data);
        //Flash::success ("setting created successfully!");
        $request->session()->flash('alert-success','User was successfully');
         return redirect(route('admin.settings.index'));
    }

    public function edit($id){
        $setting = Setting ::find($id);
         if(!$setting){
            abort(404);
         }
         return view('backend.setting.edit')->with(array(
            "setting" => $setting));
    }
    public function update($id , UpdateSettingRequest $request){
         $data = $request->all();
         $setting = Setting ::find($id);
          if(!$setting){
            abort(404);
        }

         $setting->update($data); 

        return redirect()->back()->with("flash_success","Update successfully");
    }
    public function destroy($id ,DeleteSettingRequest $request){
         $data = $request->all();
        $setting = Setting :: find($id);
        $setting->delete();
        return redirect(route('admin.settings.index'))->with("flash_success","Delete successfully");
    }

}
