<?php


namespace Package\Domain\Selection;

use App\Selection;
use Package\Entity\SelectionEntity;
use Package\Value\Selection\ActionType;
use Package\Value\Selection\SelectionHistory;
use Package\Value\Selection\SelectionId;
use Package\Value\Selection\Status;

class QuerySelection
{
    /**
     * @var SelectionId
     */
    private $id;

    /**
     * @var SelectionHistory[]
     */
    private $histories;


    private function __construct(SelectionId $selectionId, array $histories)
    {
        $this->setId($selectionId);
        $this->setHistories($histories);
    }

    /**
     * @param Selection $selection
     * @return QuerySelection
     */
    public static function generate(Selection $selection)
    {
        return new self(
            new SelectionId($selection->id),
            $selection->selectionHistories->map(function (\App\SelectionHistory $selectionHistory) {
                return new SelectionHistory(
                    new ActionType($selectionHistory->action_type),
                    new Status($selectionHistory->status),
                    $selectionHistory->order
                );
            })->toArray()
        );
    }

    /**
     * クライアントが同意した選考スケジュールの選考か
     */
    public function agreeScheduleByClient(): bool
    {
        foreach ($this->getHistories() as $history) {
            if (
                $history->actionType() === ActionType::CLIENT
                && $history->status() === Status::SELECTION
            ) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return SelectionId
     */
    public function getId(): SelectionId
    {
        return $this->id;
    }

    /**
     * @return SelectionHistory[]
     */
    private function getHistories(): array
    {
        return $this->histories;
    }

    /**
     * @param SelectionId $id
     */
    private function setId(SelectionId $id): void
    {
        $this->id = $id;
    }

    /**
     * @param SelectionHistory[] $histories
     */
    private function setHistories(array $histories): void
    {
        $this->histories = $histories;
    }
}
