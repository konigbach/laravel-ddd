<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\CreateCalendarEvent;

final readonly class CommandResponse
{
    public function __construct(
        public string $id,
    ) {
    }
}
