<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\ListCalendarEvents;

use Business\CalendarEvent\Domain\CalendarEvent;

final readonly class QueryResponse
{
    /**
     * @param  array<CalendarEvent>  $calendarEvents
     */
    public function __construct(
        public array $calendarEvents
    ) {
    }
}
