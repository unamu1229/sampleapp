<?php


namespace App\Http\Controllers\Auth;


use App\Admin;
use App\Http\Controllers\Controller;

class AdminRegisterController extends RegisterController
{

    public function showRegistrationForm()
    {
        parent::showRegistrationForm();
        return view('auth.register_admin');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Admin
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}