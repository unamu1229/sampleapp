<?php

namespace Tests\Unit;

use Package\Domain\Selection\CommandSelection;
use Package\Repository\CommandSelectionRepository;
use Tests\TestCase;

class SelectionTest extends TestCase
{

    /**
     * @var CommandSelectionRepository|null
     */
    private $commandSelectionRepository;

    public function setUp(): void
    {
        parent::setUp();
        $this->commandSelectionRepository = $this->app->make(CommandSelectionRepository::class);
    }

    /**
     * @throws \Exception
     */
    public function testPush()
    {
        $selectionEntity = CommandSelection::entry();
        $this->commandSelectionRepository->push($selectionEntity);
        $this->assertTrue(true);

        return $selectionEntity;
    }

    /**
     * @depends testPush
     */
    public function testPut(CommandSelection $selectionEntity)
    {
        $selectionEntity->agreeScheduleByClient();
        $this->commandSelectionRepository->put($selectionEntity);
        $this->assertTrue(true);
    }


    public function test_agreeByCustomer()
    {
        $selectionEntity = CommandSelection::entry();
        $this->commandSelectionRepository->push($selectionEntity);
        $selectionEntity->agreeScheduleByCustomer();
        $this->commandSelectionRepository->put($selectionEntity);
        $this->assertTrue(true);
    }
}
