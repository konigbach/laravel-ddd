<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\ListCalendarEvents;

use Business\CalendarEvent\Domain\CalendarEventRepository;
use Business\CalendarEvent\Domain\FilterCriteria;

final readonly class QueryHandler
{
    public function __construct(
        private CalendarEventRepository $calendarEventRepository,
    ) {
    }

    public function __invoke(Query $query): QueryResponse
    {
        $calendarEvents = $this->calendarEventRepository->get(
            new FilterCriteria(
                startAt: $query->startAt,
                endAt: $query->endAt,
            )
        );

        return new QueryResponse($calendarEvents);
    }
}
