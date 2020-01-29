<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
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
    protected $redirectTo = '/';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
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
        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->save();

        Address::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'house_number' => $data['house_number'],
            'local_number' => $data['local_number'],
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'user_id' => $user->id,
            'is_default' => 1,
        ]);
        if ($user->id) {
            $this->success('Rejestracja przebiegla pomyslnie.');
        }
        return $user;
    }
}
