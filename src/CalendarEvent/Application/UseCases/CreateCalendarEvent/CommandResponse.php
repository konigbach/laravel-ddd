<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\CreateCalendarEvent;

use Business\CalendarEvent\Domain\CalendarEvent;
use Carbon\CarbonImmutable;

final readonly class CommandResponse
{
    public function __construct(
        public string $id,
    ) {
    }
}
