<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\UpdateCalendarEvent;

use Business\CalendarEvent\Application\Services\FindCalendarEvent\CalendarEventFinder;
use Business\CalendarEvent\Domain\CalendarEventRepository;
use Business\CalendarEvent\Domain\CalendarEventUpdater;
use Business\Shared\Bus\Command\Domain\CommandHandlerInterface;

final readonly class CommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository,
        private CalendarEventUpdater $calendarEventUpdater,
        private CalendarEventFinder $calendarEventFinder,
    ) {
    }

    public function __invoke(Command $command): CommandResponse
    {
        $calendarEvent = $this->calendarEventFinder->find($command->id);

        $calendarEvent = $this->calendarEventUpdater->update(
            $calendarEvent,
            title: $command->title,
            description: $command->description,
            startAt: $command->startAt,
            endAt: $command->endAt,
        );

        $this->calendarEventRepository->persist($calendarEvent);

        return new CommandResponse();
    }
}
