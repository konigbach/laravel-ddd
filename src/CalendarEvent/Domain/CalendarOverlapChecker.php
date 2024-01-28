<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

final readonly class CalendarOverlapChecker
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository
    ) {
    }

    public function check(CalendarEvent $calendarEvent): void
    {
        $overlappingEventExist = $this->calendarEventRepository->overlappingEventsExist($calendarEvent);

        if ($overlappingEventExist) {
            throw new CalendarEventOverlapException();
        }
    }
}
