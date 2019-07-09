<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        
        $test = "save = 'aaa'; var_dump("lllll");  \$test2->lll";
        $test2 = new \stdClass();
        $test2->$test = 'ss';

        var_dump($test2);

        $user = User::find(1);
        if (old()) {
            $user->licenses = collect(old('license'))->map(function($val){
                $value = new \stdClass();
                $value->name = $val;
                return $value;
            });


        }
        debug($user->licenses);
        return view('profile', ['user' => $user]);
    }

    public function edit(ProfileRequest $request)
    {

    }
}
