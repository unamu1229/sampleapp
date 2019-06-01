<?php


namespace Package\Service;


use Package\Entity\CustomerEntity;
use Package\Repository\LicenseRepository;
use Package\Repository\UserRepository;
use Package\Value\License;

class CustomerFactory
{

    private $userRepository;
    private $licenseRepository;

    public function __construct(
        UserRepository $userRepository,
        LicenseRepository $licenseRepository
    ) {
        $this->userRepository = $userRepository;
        $this->licenseRepository = $licenseRepository;
    }

    /**
     * 新規作成する時
     * @param array $customer
     * @return CustomerEntity
     */
    public function create(array $customer): CustomerEntity
    {
        if ($this->userRepository->sameEmail($customer['email'])) {
            throw new \DomainException('すでに同じemailが利用されています');
        }

        $customerEntity = $this->constructor(null, $customer);

        $this->common($customer, $customerEntity);

        return $customerEntity;
    }

    /**
     * リポジトリに存在している時
     * @param array $customer
     * @return CustomerEntity
     */
    public function generate(array $customer): CustomerEntity
    {
        $customerEntity = $this->constructor($customer['id'], $customer);

        $this->common($customer, $customerEntity);

        return $customerEntity;
    }


    public function constructor($id, array $customer)
    {
        return new CustomerEntity(
            $id,
            $customer['name'],
            $customer['address'],
            $customer['email']
        );
    }

    /**
     * 共通処理
     * @param array $customer
     * @param CustomerEntity $customerEntity
     */
    private function common(array $customer, CustomerEntity $customerEntity)
    {
        if (array_key_exists('license', $customer)) {
            $customerEntity->setLicense($this->licenses($customer['license']));
        }
    }

    private function licenses(array $licenses)
    {
        $tmp = [];
        foreach ($licenses as $license) {
            $tmp[] = new License($license, $this->licenseRepository->all()->pluck('name')->toArray());
        }
        return $tmp;
    }
}