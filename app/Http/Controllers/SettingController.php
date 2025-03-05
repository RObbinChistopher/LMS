<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use ImageUploadTrait;
    public function showSetting(){
        $setting = Setting::findOrFail(1);
        return response()->json($setting);
    }
    public function updateSetting(Request $request)
    {
        $setting = Setting::findOrFail(1);
        $image = $this->Uploadimage($request, 'logo', 'setting');
        $setting->website_name = $request->website_name;
        $setting->website_logo = $image;
        $setting->email = $request->email;
        $setting->phone_number = $request->phone_number;
        $setting->facebook_link = $request->facebook_link;
        $setting->instagram_link = $request->instagram_link;
        $setting->linkedin_link = $request->linkedin_link;
        $setting->save();
        return response()->json(['success' => 'Setting Update Successfully']); 
    }
}
