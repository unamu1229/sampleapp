<?php


namespace App\Http;


class Test
{
    public function __invoke()
    {
        return view('welcome');
    }
}