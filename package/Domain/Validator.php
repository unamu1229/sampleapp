<?php


namespace Package\Domain;

abstract class Validator
{
    private $notificationHandler;

    public function __construct(ValidationNotificationHandler $notificationHandler)
    {
        $this->notificationHandler = $notificationHandler;
    }

    abstract public function validate();

    /**
     * @return ValidationNotificationHandler
     */
    public function getNotificationHandler(): ValidationNotificationHandler
    {
        return $this->notificationHandler;
    }

    /**
     * @param ValidationNotificationHandler $notificationHandler
     */
    public function setNotificationHandler(ValidationNotificationHandler $notificationHandler): void
    {
        $this->notificationHandler = $notificationHandler;
    }
}
