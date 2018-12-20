<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        // dd($data);
        return Validator::make($data, [
            'name' => ['string', 'max:30'],
            'last_name' => ['string', 'max:30'],
            'sex' => ['required'],
            'birthdate' => ['string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:11',  'max:11' ,'regex:/^[0][9][0-3][0-9]{8,8}$/'],
            'profession' => ['string', 'max:50'],
            'university' => ['string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'street' => ['required', 'string', 'max:50'],
            'alley' => ['required', 'string', 'max:50'],
            'plate' => ['required', 'numeric','min:1' ,'max:9999'],
            'postal_code' => ['numeric', 'max:9999999999'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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


        return User::create([
            'first_name' => $data['name'],
            'last_name' => $data['last_name'],
            'sex' => $data['sex'],
            'birthdate' => $data['birthdate'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'profession' => $data['profession'],
            'university' => $data['university'],
            'city' => $data['city'],
            'street' => $data['street'],
            'alley' => $data['alley'],
            'plate' => $data['plate'],
            'postal_code' => $data['postal_code'],
            'role_id' => 2,
            'status_id' => 1,
            'confirm' => 0,
            'postal_code' => $data['postal_code'],
            'password' => Hash::make($data['password']),
        ]);
        
    }
}
