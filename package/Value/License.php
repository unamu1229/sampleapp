<?php


namespace Package\Value;


class License
{

    private $value;

    public function __construct(string $license, array $masterLicenses)
    {
        if (!in_array($license, $masterLicenses, true)) {
            throw new \DomainException('このライセンスは対象外です。');
        }

        $this->value = $license;
    }

    public function value(): string
    {
        return $this->value;
    }
}