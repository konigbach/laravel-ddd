<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\Services\FindCalendarEvent;

use Business\CalendarEvent\Domain\CalendarEvent;
use Business\CalendarEvent\Domain\CalendarEventNotExist;
use Business\CalendarEvent\Domain\CalendarEventRepository;

final readonly class CalendarEventFinder
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository
    ) {
    }

    public function find(string $id): CalendarEvent
    {
        $calendarEvent = $this->calendarEventRepository->find($id);

        if (! $calendarEvent) {
            throw new CalendarEventNotExist($id);
        }

        return $calendarEvent;
    }
}
