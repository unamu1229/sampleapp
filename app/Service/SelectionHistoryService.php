<?php


namespace App\Service;

use Package\Repository\SelectionHistoryRepository;
use Package\Repository\CommandSelectionRepository;
use Package\Service\AddSelectionHistory;
use Package\Value\Selection\SelectionId;

class SelectionHistoryService
{
    private $selectionRepository;

    private $selectionHistoryRepository;

    private $addSelectionHistory;

    public function __construct(
        CommandSelectionRepository $selectionRepository,
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
        $selectionEntity->agreeScheduleByClient($this->addSelectionHistory);
        $this->selectionRepository->save($selectionEntity);
    }
}
