<?php

namespace Tests\Unit;

use App\Service\SelectionHistoryService;
use Package\Value\Selection\SelectionId;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SelectionHistoryTest extends TestCase
{
    public function test_AgreeScheduleByCustomer()
    {
        /** @var SelectionHistoryService $selectionHistoryService */
        $selectionHistoryService = $this->app->make(SelectionHistoryService::class);
        $selectionHistoryService->agreeScheduleByCustomer(new SelectionId('5e0aa455e6c63'));
    }
}
