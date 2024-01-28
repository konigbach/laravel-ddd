<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\ListCalendarEvents;

use Business\Shared\Bus\Query\Domain\QueryInterface;
use Carbon\CarbonImmutable;

final readonly class Query implements QueryInterface
{
    public function __construct(
        public CarbonImmutable $startAt,
        public CarbonImmutable $endAt,
    ) {
    }
}
