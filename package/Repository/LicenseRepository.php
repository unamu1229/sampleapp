<?php


namespace Package\Repository;


use App\License;

class LicenseRepository
{
    public $license;

    public function __construct(License $license)
    {
        $this->license = $license;
    }

    public function all()
    {
        return $this->license->all();
    }
}