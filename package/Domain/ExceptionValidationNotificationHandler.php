<?php


namespace Package\Domain;

use Illuminate\Validation\ValidationException;

class ExceptionValidationNotificationHandler implements ValidationNotificationHandler
{
    public function handleError($message)
    {
        throw ValidationException::withMessages([$message]);
    }
}
