<?php


namespace Package\Repository;

use App\Selection;
use Package\Entity\SelectionEntity;
use Package\Value\Selection\SelectionId;

class SelectionRepository
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

    public function save(SelectionEntity $selectionEntity)
    {
    }
}
