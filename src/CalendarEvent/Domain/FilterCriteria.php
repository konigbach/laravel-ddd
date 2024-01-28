<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use Carbon\CarbonImmutable;

final readonly class FilterCriteria
{
    public function __construct(
        public CarbonImmutable $startAt,
        public CarbonImmutable $endAt,
    ) {
    }
}
