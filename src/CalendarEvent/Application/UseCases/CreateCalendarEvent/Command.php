<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\CreateCalendarEvent;

use Business\Shared\Bus\Command\Domain\CommandInterface;
use Carbon\CarbonImmutable;

final readonly class Command implements CommandInterface
{
    public function __construct(
        public string $title,
        public ?string $description,
        public CarbonImmutable $startAt,
        public CarbonImmutable $endAt,
        public ?string $frequency,
        public ?CarbonImmutable $repeatUntil,
    ) {
    }
}
