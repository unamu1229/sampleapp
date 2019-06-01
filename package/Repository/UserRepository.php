<?php


namespace Package\Repository;


use App\User;
use Package\Entity\CustomerEntity;
use Package\Service\CustomerFactory;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function test()
    {
        static $user;

        if (!$user) {
            $user = $this->user->all();
        }

        return $user;
    }


    public function test2()
    {
        return $this->user->all();
    }

    public function sameEmail(string $email)
    {
        return $this->user->where('email', $email)->first() ? true : false;
    }


    /**
     *
     * @param $id
     * @return CustomerEntity
     */
    public function generateById($id): CustomerEntity
    {
        $user = $this->select($id);

        // コンストラクタインジェクションにすると循環参照になるので
        /** @var CustomerFactory $customerFactory */
        $customerFactory = app()->make(CustomerFactory::class);

        return $customerFactory->generate($this->convertFactoryFormat($user));
    }

    private function convertFactoryFormat($user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'address' => '東京都',
            'email' => $user->email,
            'license' => $user->licenses->pluck('name')->toArray()
        ];
    }

    public function select($id)
    {
        return $this->user->find($id);
    }
}