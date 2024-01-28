<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\CreateCalendarEvent;

use Business\CalendarEvent\Domain\CalendarEventCreator;
use Business\CalendarEvent\Domain\CalendarEventRepository;
use Business\Shared\Bus\Command\Domain\CommandHandlerInterface;

final readonly class CommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository,
        private CalendarEventCreator $calendarEventCreatorService
    ) {
    }

    public function __invoke(Command $command): CommandResponse
    {
        $calendarEvent = $this->calendarEventCreatorService->create(
            title: $command->title,
            description: $command->description,
            startAt: $command->startAt,
            endAt: $command->endAt,
        );

        $this->calendarEventRepository->persist($calendarEvent);

        return new CommandResponse(
            id: $calendarEvent->id,
        );
    }
}
