<?php


namespace App\Http;


use Package\Repository\UserRepository;
use Package\Service\CustomerEmailChange;

class ProfileCommandService
{
    private $userRepository;
    private $customerEmailChange;

    public function __construct(UserRepository $userRepository, CustomerEmailChange $customerEmailChange)
    {
        $this->userRepository = $userRepository;
        $this->customerEmailChange = $customerEmailChange;
    }

    public function edit(array $customer)
    {
        $customerEntity = $this->userRepository->generateById(1);
        $customerEntity->setName($customer['name']);
        $this->customerEmailChange->setEmail($customer['email'], $customerEntity);
        $this->userRepository->save($customerEntity);
    }
}