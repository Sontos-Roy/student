<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    function index(){
        $this->data['settings'] = Setting::all();
        return view('admin.settings.index', $this->data);
    }
    function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'key' => 'required|unique:settings,key',
            'type' => 'required',
            'value' => 'nullable'
        ]);
        $setting = Setting::create($data);

        session()->put('info', []);
        Cache::forget('settings');

        return response()->json(['status' => true, 'msg' => 'Setting Created Successfully', 'url' => route('admin.settings.edit', $setting->id)]);
        // return redirect()->route('admin.settings.edit', $setting->id)->with("success", "Setting Created Sucessfully");

    }
    function show($id){

    }

    function edit($id){
        $this->data['setting'] = Setting::find($id);
        return view('admin.settings.edit', $this->data);
    }

    function update(Request $request, $id){
        $data = $request->validate([
            'name' => 'required',
            'key' => 'required',
            'type' => 'required',
            'value' => 'required',
        ]);

        if($data['type'] == "image"){
            unset($data['value']);
        }

        $update = Setting::find($id);
        $update->update($data);

        if ($request->hasFile('value')) {
            if ($update->value) {
                deleteImage('settings', $update->value);
            }
            $image = $request->file('value');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->storeAs('public/images/settings', $filename);
            $update->value = $filename;
            $update->save();
        }
        session()->put('info', []);
        Cache::forget('settings');
        // return redirect()->route('admin.settings.index')->with("success", "Setting Created Successfully");

        return response()->json(['status' => true, 'msg' => "Setting Created Successfully", 'url' => route('admin.settings.index')]);

    }

    function destroy($id){
        $setting = Setting::find($id);

        if($setting->type == "image" && $setting->value){
            deleteImage('settings', $setting->value);
        }

        $setting->delete();
        session()->put('info', []);
        Cache::forget('settings');
        return response()->json(['status'=> true, 'msg' => 'Setting Deleted Successfully']);
    }
}
