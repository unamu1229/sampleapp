<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(IndexRequest $req) {
        return view('home');
    }
}
