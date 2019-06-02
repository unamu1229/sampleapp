<?php


namespace Package\Service;


use Package\Entity\CustomerEntity;
use Package\Repository\UserRepository;

class CustomerEmailChange
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function setEmail($email, CustomerEntity $customerEntity)
    {
        if ($this->userRepository->sameEmailExceptSelf($email, $customerEntity->getId())) {
            throw new \DomainException('このメールアドレスはすでに利用されています');
        }
        $customerEntity->setEmail($email);
    }
}