<?php


namespace Package\Repository;

use App\Events\PushCommandSelection;
use App\Events\PutCommandSelection;
use App\Selection;
use App\SelectionHistory;
use Package\Domain\Selection\CommandSelection;
use Package\Entity\SelectionEntity;
use Package\Value\Selection\SelectionId;

class CommandSelectionRepository
{
    public function findById(SelectionId $id)
    {
        $selection = Selection::query()->find($id->value());
        if (!$selection) {
            return null;
        }

        return new SelectionEntity(
            new SelectionId($selection->id)
        );
    }

    /**
     * 新たに保存する時
     * @param CommandSelection $selectionEntity
     */
    public function push(CommandSelection $selectionEntity)
    {
        $selection = new Selection();
        $selection->id = $selectionEntity->Id();
        $selection->version = 1;
        $selection->save();

        /** @var \Package\Value\Selection\SelectionHistory $history */
        foreach ($selectionEntity->getHistories() as $history) {
            $selectionHistory = new SelectionHistory();
            $selectionHistory->selection_id = $selection->id;
            $selectionHistory->action_type = $history->actionType();
            $selectionHistory->status = $history->status();
            $selectionHistory->order = $history->order();
            $selectionHistory->save();
        }

        event(new PushCommandSelection($selection->id));
    }

    /**
     * 更新する時
     * @param CommandSelection $selectionEntity
     */
    public function put(CommandSelection $selectionEntity)
    {
        $selection = Selection::query()->find($selectionEntity->id());
        $selection->version = $selection->version + 1;
        $selection->save();

        foreach ($selection->selectionHistories as $selectionHistory) {
            $selectionHistory->delete();
        }

        /** @var \Package\Value\Selection\SelectionHistory $history */
        foreach ($selectionEntity->getHistories() as $history) {
            $selectionHistory = new SelectionHistory();
            $selectionHistory->selection_id = $selection->id;
            $selectionHistory->action_type = $history->actionType();
            $selectionHistory->status = $history->status();
            $selectionHistory->order = $history->order();
            $selectionHistory->save();
        }

        event(new PutCommandSelection($selection->id));
    }
}
