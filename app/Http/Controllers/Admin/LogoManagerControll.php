<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\LogoManager;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LogoManagerControll extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function adminlogo()
    {
        $brand = LogoManager::all();
        return view('admin.logo.logo', compact('brand'));
    }

    public function Storelogo(Request $request)
    {
        // dd($request->all());


        $data = array();
        $data['type'] = $request->type;
        $image = $request->file('logo_image');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['logo_image'] = $image_url;
            $brand = DB::table('logo_managers')->insert($data);
            $notification = array(
                'messege' => 'Logo Inserted Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $brand = DB::table('logo_managers')->insert($data);
            $notification = array(
                'messege' => 'Its Done',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    public function DeleteBrand($id)
    {
        $data = DB::table('logo_managers')->where('id', $id)->first();
        $image = $data->brand_logo;
        unlink($image);
        $brand = DB::table('logo_managers')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    public function EditLogo($id)
    {
        $brand = DB::table('logo_managers')->where('id', $id)->first();
        return view('admin.logo.edit_logo', compact('brand'));
    }

    public function Updatelogo(Request $request, $id)
    {

        $oldlogo = $request->old_logo;
        $data = array();
        $data['type'] = $request->type;
        $image = $request->file('logo_image');
        if ($image) {
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);

            $data['logo_image'] = $image_url;
            $brand = DB::table('logo_managers')->where('id', $id)->update($data);
            $notification = array(
                'messege' => 'Logo Updated Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.logo')->with($notification);
        } else {
            $brand = DB::table('logo_managers')->where('id', $id)->update($data);
            $notification = array(
                'messege' => 'Update Without Images',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin.logo')->with($notification);
        }
    }
}
