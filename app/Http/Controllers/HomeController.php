<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Package\Repository\UserRepository;
use Package\Service\UserService;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserRepository $repo, UserService $service)
    {
        $this->test($repo);

        return view('home');
    }


    private function test($repo)
    {
        $test = $repo->test();

        $test = $repo->test();

        $test = $repo->test();

        $test = $repo->test();

        $test = $repo->test();

        $test = $repo->test();
    }

    private function test2($repo)
    {
        $test = $repo->test2();

        $test = $repo->test2();

        $test = $repo->test2();

        $test = $repo->test2();

        $test = $repo->test2();

        $test = $repo->test2();
    }

    public function admin()
    {
        return view('admin_home');
    }
}
