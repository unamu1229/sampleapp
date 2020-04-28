<?php


namespace Package\Repository;

use Package\Domain\Selection\QuerySelection;

class QuerySelectionRepository
{
    public function put(QuerySelection $querySelection)
    {
        $elqSelection = \App\QuerySelection::query()->find($querySelection->getId()->value());
        $elqSelection->is_client_agree = $querySelection->agreeScheduleByClient() ? 1 : 0;
        $elqSelection->save();
    }
}
