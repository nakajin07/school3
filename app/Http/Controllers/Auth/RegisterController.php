<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use App\User;
use App\Instructor; // ←←←これを追加 use App\User;は削除
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/instructors/personal';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */




    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'last_name' => ['required', 'string', 'max:255'],
    //         'first_name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'phone_num' => ['required', 'string', 'max:255'],
    //         'check_key' => ['required'],
    //     ]);
    // }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:instructors'],
                                            // 'unique:users'から'unique:accounts'に変更
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required', 'string', 'max:255'],
            // 'check_key' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Instructor
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         'last_name' => $data['last_name'],
    //         'first_name' => $data['first_name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'phone_num' => $data['phone_num'],
    //         'check_key' => $data['check_key'],
    //     ]);
    // }

    protected function create(array $data)
    {
        return Instructor::create([ // UserからInstructorに変更
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phone_no'],
        ]);
    }





}
