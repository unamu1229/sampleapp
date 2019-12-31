<?php


namespace Package\Value\Selection;

class SelectionHistoryEntity
{
    private $selectionId;

    private $actionType;

    private $status;

    private $order;

    public function __construct(SelectionId $selectionId, ActionType $actionType, Status $status, int $order)
    {
        $this->selectionId = $selectionId;
        $this->actionType = $actionType;
        $this->status = $status;
        $this->order = $order;
    }

    public function selectionId()
    {
        return $this->selectionId->value();
    }

    public function actionType()
    {
        return $this->actionType->value();
    }

    public function status()
    {
        return $this->status->value();
    }

    public function order()
    {
        return $this->order;
    }
}
