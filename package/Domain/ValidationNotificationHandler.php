<?php


namespace Package\Domain;

interface ValidationNotificationHandler
{
    public function handleError($message);
}
