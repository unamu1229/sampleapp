<?php


namespace Package\Domain\Selection;

use Package\Value\Selection\ActionType;
use Package\Value\Selection\SelectionHistory;
use Package\Value\Selection\SelectionId;
use Package\Value\Selection\Status;

class CommandSelection
{

    /**
     * @var SelectionId
     */
    private $id;

    /**
     * @var SelectionHistory[]
     */
    private $histories;

    private function __construct(SelectionId $id, array $histories)
    {
        $this->setId($id);
        $this->setHistories($histories);
    }

    /**
     * 選考にエントリーする
     * @return CommandSelection
     * @throws \Exception
     */
    public static function entry()
    {
        return new self(SelectionId::create(), [
            new SelectionHistory(
                new ActionType(ActionType::CUSTOMER),
                new Status(Status::ENTRY),
                0
            )
        ]);
    }

    /**
     * カスタマーがスケジュールを同意する
     */
    public function agreeScheduleByCustomer()
    {
        $this->pushHistory(
            new SelectionHistory(
                new ActionType(ActionType::CUSTOMER),
                new Status(Status::SELECTION),
                $this->historyOrder()
            )
        );
    }

    /**
     * クライアントがスケジュールを同意する
     */
    public function agreeScheduleByClient()
    {
        $this->pushHistory(
            new SelectionHistory(
                new ActionType(ActionType::CLIENT),
                new Status(Status::SELECTION),
                $this->historyOrder()
            )
        );
    }

    /**
     * @param SelectionId $id
     */
    public function setId(SelectionId $id): void
    {
        $this->id = $id;
    }


    /**
     * @return int
     */
    private function historyOrder()
    {
        return count($this->histories);
    }

    /**
     * @return SelectionId
     */
    private function getId(): SelectionId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function id(): string
    {
        return $this->getId()->value();
    }

    /**
     * @return SelectionHistory[]
     */
    public function getHistories(): array
    {
        return $this->histories;
    }

    /**
     * @param SelectionHistory[] $histories
     */
    private function setHistories(array $histories): void
    {
        $this->histories = $histories;
    }

    /**
     * @param SelectionHistory $history
     */
    private function pushHistory(SelectionHistory $history)
    {
        $this->histories[] = $history;
    }
}
