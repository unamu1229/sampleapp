<?php


namespace Package\Service;


use Package\Repository\UserRepository;
use Package\Value\Mail;

class UserService
{

    private $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function send(Mail $mail, $to, $massage)
    {
        $mail->send($to, $massage);
    }

    public function test()
    {
        return $this->repo->test();
    }

    public function test2()
    {
        return $this->repo->test2();
    }
}