<?php


namespace Package\Service;


use Package\Value\Mail;

class UserService
{

    public function send(Mail $mail, $to, $massage)
    {
        $mail->send($to, $massage);
    }
}