<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use Carbon\CarbonImmutable;

final readonly class CalendarEventUpdater
{
    public function __construct(
        private CalendarOverlapChecker $calendarOverlapChecker,
    ) {
    }

    public function update(
        CalendarEvent $calendarEvent,
        ?string $title,
        ?string $description,
        ?CarbonImmutable $startAt,
        ?CarbonImmutable $endAt,
    ): CalendarEvent {

        $this->calendarOverlapChecker->check($calendarEvent);

        if ($title) {
            $calendarEvent->setTitle($title);
        }

        if ($description) {
            $calendarEvent->setDescription($description);
        }

        if ($startAt) {
            $calendarEvent->setStartAt($startAt);
        }

        if ($endAt) {
            $calendarEvent->setEndAt($endAt);
        }

        return $calendarEvent;
    }
}
