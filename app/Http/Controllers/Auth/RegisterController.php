<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Applier;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Recruiter;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function recruiterPage()
    {
        return view('recruiter/register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {        
        $rules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'int'],
        ];
    
        if ($data['role'] == 0) {
            $rules['name'] = ['required', 'string'];
            $rules['phone_number'] = ['required', 'string'];
            $rules['birth_date'] = ['required', 'date'];
        } else if ($data['role'] == 1) {

        } else {
            $rules['name'] = ['required', 'string'];
            $rules['description'] = ['required', 'string'];
            $rules['phone_number'] = ['required', 'string'];
            $rules['city'] = ['required', 'string'];
            $rules['address'] = ['required', 'string'];
        }        

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {            
        $user = User::create([            
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        if ($user->role == 'user') {
            Applier::create([            
                'user_id' => $user->id, 
                'name' => $data['name'],
                'birth_date' => $data['birth_date'],
                'email' => $data['email'],
                'phone_number' => $data['phone_number'],
            ]);
        } else if ($user->role == 'admin') {
            
        } else {
            Recruiter::create([
                'user_id'=> $user->id,
                'name'=> $data['name'],
                'description'=> $data['description'],
                'phone_number'=> $data['phone_number'],                
                'city'=> $data['city'],
                'address'=> $data['address'],
            ]);
        }
        
        return $user;
    }

    protected function registered(Request $request, $user)
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.home');
        } elseif (Auth::user()->role == 'manager') {
            session()->flash('success', 'Register Berhasil.');
            return redirect()->route('home');
        } else {
            session()->flash('success', 'Register Berhasil.');
            return redirect()->route('home');
        }
    }
    
}
