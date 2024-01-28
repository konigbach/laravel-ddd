<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\DeleteCalendarEvent;

use Business\CalendarEvent\Application\Services\FindCalendarEvent\CalendarEventFinder;
use Business\CalendarEvent\Domain\CalendarEventRepository;
use Business\Shared\Bus\Command\Domain\CommandHandlerInterface;

final readonly class CommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository,
        private CalendarEventFinder $calendarEventFinder,
    ) {
    }

    public function __invoke(Command $command): CommandResponse
    {
        $calendarEvent = $this->calendarEventFinder->find($command->id);

        $this->calendarEventRepository->delete($calendarEvent->id);

        return new CommandResponse();
    }
}
