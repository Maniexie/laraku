<?php

namespace App\Http\Controllers;

use Validate;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Notifications\VerifyEmail;


class SesiController extends Controller
{

    /* SESI LOGIN */

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request) :RedirectResponse
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/dashboard')->with('success', 'Login berhasil');
        }

        return back()->with('error', 'Email or Password salah');

    }



    /* SESI REGISTER */

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string' , 
                        Rule::unique('users')->ignore($request->id)],
            'password' => 'required',
            'phone' => 'required'
        ]);

        $infoRegister = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'updated_at' => $request->updated_at,
            
        ]);

        if ($infoRegister->fails()) {
            return redirect('/register')
                        ->withErrors($infoRegister)
                        ->withInput();
        }


        //  $checkDuplicated = User::where($request->email)->first();

        
        
        // $infoRegister = $request->only('email','password');
        // Auth::attempt($infoRegister);
        // $request->session()->regenerate();
        // return redirect()->route('login');
        
        
        try{
            
            DB::beginTransaction();
            
            $table = new User();
            $table->name = $infoRegister['name'];
            $table->email = $infoRegister['email'];
            $table->password = bcrypt($infoRegister['password']);
            $table->phone = $infoRegister['phone'];
            $table->created_at = now();
            $table->updated_at = null;
            $table->save();
            
                DB::commit();
                return redirect()->back()->with('error','Email sudah ada!!');
            }
             catch(\Exception $e) {
                DB::rollBack();
                return redirect()->back()->with('nice','Selamat anda telah berhasil membuat akun!!');
            }

        


    }


    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return Redirect::to('/');
    }
}
