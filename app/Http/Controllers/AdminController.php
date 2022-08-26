<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login.adminlogin');

    }

    public function dashboard()
    {
        // dd('dashboard');
        return view('admin.layout.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // dd($request->all());
        $checkAuth = $request->all();
        if (Auth::guard('admin')->attempt([
            'email'=>$checkAuth['email'],
            'password'=>$checkAuth['password'],
        ])){
            // dd($request->all());
            $notification = array(
                'messege' => 'You hav login Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->route('admin_dashboard')->with($notification);
            // return redirect()->route('admin_dashboard')->with('message','admin login successfully!');
        }else{
            // dd($request->all());
            $notification = array(
                'messege' => 'Invalid email or password!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function adminregister(Request $request)
    {
        // dd($request->all());
        return view('admin.login.adminregister');

    }
    public function registerstore(Request $request)
    {
        // dd($request->all());

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

       Admin::insert([
            'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),
       ]);

        // auth()->login($admindata);

        return redirect()->route('admin_login_form')->with('success','You have resgistered successfullty!');
        // return view('admin_dashboard');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function Adminlogout(Admin $admin)
    {
        auth::guard('admin')->logout();
        return redirect()->route('admin_login_form')->with('error','You have logged out');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
