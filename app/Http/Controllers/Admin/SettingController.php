<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        // dd($setting);
        return view('admin.setting.index', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'about_title' => 'required','min:3',
            'about_description' => 'required',
            'github_url' => 'required|url',
            'about_photo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // $setting = Setting::first();
        if($request->hasfile('image')){
            if($setting->about_photo != null){
                Storage::delete($setting->about_photo);
            }
            $get_new_file = $request->file('image')->store('images', 'public');
            $setting->about_photo = $get_new_file;
        }
        $setting->update($validated);
        return to_route('admin.setting.index')->with('message','Data Updated');
    }

}
