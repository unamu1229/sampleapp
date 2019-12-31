<?php


namespace Package\Repository;

use App\SelectionHistory;
use Package\Value\Selection\ActionType;
use Package\Value\Selection\SelectionHistoryEntity;
use Package\Value\Selection\SelectionId;
use Package\Value\Selection\Status;

class SelectionHistoryRepository
{
    public function save(SelectionHistoryEntity $entity)
    {
        $selectionHistory = new SelectionHistory();
        $selectionHistory->selection_id = $entity->selectionId();
        $selectionHistory->action_type = $entity->actionType();
        $selectionHistory->status = $entity->status();
        $selectionHistory->order = $entity->order();
        $selectionHistory->save();
    }

    /**
     * @param SelectionId $selectionId
     * @return \Illuminate\Support\Collection<SelectionHistoryEntity>
     */
    public function allBySelectionId(SelectionId $selectionId)
    {
        $selectionHistories = SelectionHistory::query()->where('selection_id', $selectionId->value())->get();

        $selectionHistoriesEntity = collect();
        foreach ($selectionHistories as $selectionHistory) {
            $selectionHistoriesEntity->push(
                    new SelectionHistoryEntity(
                        new SelectionId($selectionHistory->selection_id),
                        new ActionType($selectionHistory->action_type),
                        new Status($selectionHistory->status),
                        $selectionHistory->order
                    )
            );
        }
        return $selectionHistoriesEntity;
    }
}
