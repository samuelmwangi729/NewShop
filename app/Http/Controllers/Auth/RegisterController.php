<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'FirstName'=>['required', 'string', 'max:255'],
            'LastName'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'=>['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //if user is a client, then
        //eZHq6QZzYAlsw5uewAi1Spn0ieOZxI5oh8M7mdd14
        //if user is a seller
        //NIKuPyrpx2jIC3YriwEpZXOdR6fV0p6
        //if user is admin
        //PaLr4WzwRnWAZDKRY2mi5uZTnv1wxdP5EoWqYKNV0FUhgYyoRlxU
        return User::create([
            'First_Name' => $data['FirstName'],
            'Last_Name' => $data['LastName'],
            'email' => $data['email'],
            'Level' => 'eZHq6QZzYAlsw5uewAi1Spn0ieOZxI5oh8M7mdd14',
            'Address' => 'NULL',
            'PhoneNumber' => 'NULL',
            'Town' => 'NULL',
            'County' => 'NULL',
            'Status' => 0,
            'password' => Hash::make($data['password']),
        ]);
    }
}
