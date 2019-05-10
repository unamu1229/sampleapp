<?php


namespace Package\Value;


class Mail
{

    public function send(string $to, string $massage)
    {
        echo ("{$to}に{$massage}を送信しました。");
    }
}