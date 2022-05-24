<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Seo;
use Session;

class SiteSettingController extends Controller
{
    // ================= START MANAGE SITE SETTING METHOD ================= //
    public function SiteSetting(){

        $setting = SiteSetting::find(1);
        return view('BackEnd.setting.site_update', compact('setting'));
    }
    // ================= END MANAGE SITE SETTING METHOD ================= //

    // ================= START UPDATE SITE SETTING METHOD ================= //
    public function SiteSettingUpdate(Request $request){
        
        $setting_id = $request->id;
         

        if ($request->file('logo')) {


        $image = $request->file('logo');
        $name_gen = time().$image->getClientOriginalName();
        $image->move('uploads/setting/',$name_gen);
        $save_url = 'uploads/setting/'.$name_gen;


    SiteSetting::findOrFail($setting_id)->update([
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'logo' => $save_url,

        ]);


        Session::flash('info','Setting Updated with Image Successfully');
        return redirect()->back();

        }else{

        SiteSetting::findOrFail($setting_id)->update([
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        

        ]);

        Session::flash('success','Setting Updated Successfully');
        return redirect()->back();

        } // end else 
    } // end method 
    // ================= END UPDATE SITE SETTING METHOD ================= //

    // ================= START MANAGE SEO SETTING METHOD ================= //
    public function SeoSetting(){

        $seo = Seo::find(1);
        return view('BackEnd.setting.seo_update', compact('seo'));
    }
    // ================= END MANAGE SEO SETTING METHOD ================= //

    // ================= START UPDATE SEO SETTING METHOD ================= //
    public function SeoSettingUpdate(Request $request){

        $seo_id = $request->id;

        Seo::findOrFail($seo_id)->update([
        'meta_title' => $request->meta_title,
        'meta_author' => $request->meta_author,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description,
        'google_analytics' => $request->google_analytics,        

        ]);

        Session::flash('success','Seo Updated Successfully');
        return redirect()->back();

    } // end mehtod

    // ================= END UPDATE SEO SETTING METHOD ================= //
}
