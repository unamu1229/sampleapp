<?php


namespace App\Service;

use Package\Repository\SelectionHistoryRepository;
use Package\Repository\SelectionRepository;
use Package\Service\AddSelectionHistory;
use Package\Value\Selection\SelectionId;

class SelectionHistoryService
{
    private $selectionRepository;

    private $selectionHistoryRepository;

    private $addSelectionHistory;

    public function __construct(
        SelectionRepository $selectionRepository,
        SelectionHistoryRepository $selectionHistoryRepository,
        AddSelectionHistory $selectionHistory
    ) {
        $this->selectionRepository = $selectionRepository;
        $this->selectionHistoryRepository = $selectionHistoryRepository;
        $this->addSelectionHistory = $selectionHistory;
    }

    public function agreeScheduleByCustomer(SelectionId $selectionId)
    {
        $selectionEntity = $this->selectionRepository->findById($selectionId);
        $selectionHistoryEntity = $selectionEntity->agreeScheduleByClient($this->addSelectionHistory);
        $this->selectionHistoryRepository->save($selectionHistoryEntity);
    }
}
