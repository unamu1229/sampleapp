<?php


namespace Package\Entity;

use Package\Service\AddSelectionHistory;
use Package\Value\Selection\ActionType;
use Package\Value\Selection\SelectionId;
use Package\Value\Selection\Status;
use Package\Value\Selection\SelectionHistoryEntity;

class SelectionEntity
{
    /**
     * @var SelectionId
     */
    private $id;

    public function __construct(SelectionId $id)
    {
        $this->id = $id;
    }

    /**
     * @return SelectionId
     */
    public function getId(): SelectionId
    {
        return $this->id;
    }

    public function agreeScheduleByCustomer(AddSelectionHistory $addSelectionHistory): SelectionHistoryEntity
    {
        return new SelectionHistoryEntity(
            $this->getId(),
            new ActionType(ActionType::CUSTOMER),
            new Status(Status::SELECTION),
            $addSelectionHistory->order($this->getId())
        );
    }

    public function agreeScheduleByClient(AddSelectionHistory $addSelectionHistory): SelectionHistoryEntity
    {
        return new SelectionHistoryEntity(
            $this->getId(),
            new ActionType(ActionType::CLIENT),
            new Status(Status::SELECTION),
            $addSelectionHistory->order($this->getId())
        );
    }
}
