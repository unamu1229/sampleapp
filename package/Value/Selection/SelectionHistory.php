<?php


namespace Package\Value\Selection;

class SelectionHistory
{
    private $actionType;

    private $status;

    private $order;

    public function __construct(ActionType $actionType, Status $status, int $order)
    {
        $this->actionType = $actionType;
        $this->status = $status;
        $this->order = $order;
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
