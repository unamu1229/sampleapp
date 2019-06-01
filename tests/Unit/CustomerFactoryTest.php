<?php

namespace Tests\Unit;

use Package\Service\CustomerFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerFactoryTest extends TestCase
{

    /** @var CustomerFactory */
    private $customerFactory;

    public function setUp(): void
    {
        parent::setUp();
        $this->customerFactory = $this->app->make(CustomerFactory::class);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $customer = [
            'name' => 'yoneda',
            'email' => 'yonedahiroshi12293@gmail.com',
            'address' => '東京都',
            'license' => [
                'aaaa',
                'bbbb'
            ]
        ];
        $customerEntity = $this->customerFactory->create($customer);
        var_dump($customerEntity);
        $this->assertTrue(true);
    }
}
