<?php
namespace App\Http\Controllers;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\ImgTrait;

class SettingController extends Controller
{
    use ImgTrait;
    public function create(){
        $settings=Setting::first();
        return view('admin.setting.create',compact('settings'));
    }
    public function edit(SettingRequest $request){

        $settings=Setting::first();
        $settings->update($request->all());

     return redirect()->route('setting.create')->with(['success'=>"تم التعديل بنجاح"]);
    }
}
