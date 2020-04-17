<?php


namespace Package\Service;

use Package\Repository\SelectionHistoryRepository;
use Package\Value\Selection\SelectionHistory;
use Package\Value\Selection\SelectionId;

class AddSelectionHistory
{
    private $selectionHistoryRepository;

    public function __construct(SelectionHistoryRepository $selectionHistoryRepository)
    {
        $this->selectionHistoryRepository = $selectionHistoryRepository;
    }

    public function order(SelectionId $selectionId)
    {
        $selectionHistories = $this->selectionHistoryRepository->allBySelectionId($selectionId);

        /** @var SelectionHistory|null $lastHistory */
        $lastHistory = $selectionHistories->sortByDesc(function (SelectionHistory $history) {
            return $history->order();
        })->first();

        if (!$lastHistory) {
            return 1;
        }

        return $lastHistory->order() + 1;
    }
}
