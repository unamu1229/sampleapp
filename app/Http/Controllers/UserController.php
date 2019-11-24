<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        return User::query()
            ->where('id', '>=', $request->get('start'))
            ->where('id', '<=', $request->get('end'))
            ->get();
    }
}
