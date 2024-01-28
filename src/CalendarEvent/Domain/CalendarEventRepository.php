<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

interface CalendarEventRepository
{
    /**
     * @return array<CalendarEvent>
     */
    public function get(?FilterCriteria $filterCriteria = null): array;

    public function persist(CalendarEvent $calendarEvent): void;

    public function delete(string $calendarEventId): void;

    public function find(string $id): ?CalendarEvent;

    public function overlappingEventsExist(CalendarEvent $calendarEvent): bool;
}
