<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use Carbon\CarbonImmutable;

final class RecurringPattern
{
    private function __construct(
        public ?string $frequency,
        public ?CarbonImmutable $repeatUntil
    ) {
    }

    public static function create(
        ?string $frequency,
        ?CarbonImmutable $repeatUntil
    ): self {
        return new self($frequency, $repeatUntil);
    }
}
