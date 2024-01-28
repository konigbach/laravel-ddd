<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use Carbon\CarbonImmutable;
use Ramsey\Uuid\Uuid;

final readonly class CalendarEventCreator
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository,
        private CalendarOverlapChecker $calendarOverlapChecker,
    ) {
    }

    public function create(
        string $title,
        ?string $description,
        CarbonImmutable $startAt,
        CarbonImmutable $endAt,
        ?RecurringPattern $recurringPattern,
    ): CalendarEvent {
        $calendarEvent = CalendarEvent::create(
            id: Uuid::uuid6()->toString(),
            title: $title,
            description: $description,
            startAt: $startAt,
            endAt: $endAt,
            recurringPattern: $recurringPattern,
        );

        $this->calendarOverlapChecker->check($calendarEvent);

        $this->calendarEventRepository->persist($calendarEvent);

        return $calendarEvent;
    }
}
