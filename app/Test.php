<?php


namespace App;


class Test
{
    public function exec()
    {
        $collection = collect('dog', 'cat', 'apple', 'google');
        $collection->merge(collect('banana'));
        var_dump($collection);
    }
}

(new Test())->exec();