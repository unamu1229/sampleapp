<?php


namespace Package\Entity;

use Package\Value\Job\Status;
use Ramsey\Uuid\Uuid;

class JobEntity
{
    private $id;

    private $corpId;

    private $name;

    /**
     * @var Status
     */
    private $status;

    public function __construct(string $id, string $corpId, string $name, Status $status)
    {
        $this->id = $id;
        $this->corpId = $corpId;
        $this->name = $name;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCorpId(): string
    {
        return $this->corpId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function status()
    {
        return $this->getStatus()->value();
    }

    /**
     * @return Status
     */
    private function getStatus(): Status
    {
        return $this->status;
    }





    /**
     * @return string
     */
    public static function createId(): string
    {
        return Uuid::uuid4()->toString();
    }
}
