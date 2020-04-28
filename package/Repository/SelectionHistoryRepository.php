<?php


namespace Package\Repository;

use Package\Value\Selection\ActionType;
use Package\Value\Selection\SelectionHistory;
use Package\Value\Selection\SelectionId;
use Package\Value\Selection\Status;

class SelectionHistoryRepository
{
    public function save(SelectionHistory $entity)
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
     * @return \Illuminate\Support\Collection<SelectionHistory>
     */
    public function allBySelectionId(SelectionId $selectionId)
    {
        $selectionHistories = SelectionHistory::query()->where('selection_id', $selectionId->value())->get();

        $selectionHistoriesEntity = collect();
        foreach ($selectionHistories as $selectionHistory) {
            $selectionHistoriesEntity->push(
                new SelectionHistory(
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
