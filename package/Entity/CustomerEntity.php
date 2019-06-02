<?php


namespace Package\Entity;


class CustomerEntity
{
    private $id;
    private $name;
    private $address;
    private $email;
    private $license;

    public function __construct(
        ?int $id,
        string $name,
        string $address,
        string $email
    ){
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        if ($this->id) {
            throw new \DomainException('IDは変更できません');
        }
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getLicense()
    {
        return $this->license;
    }

    public function setLicense(array $license): void
    {
        $this->license = $license;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }


}