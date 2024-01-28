<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\UpdateCalendarEvent;

use Business\Shared\Bus\Command\Domain\CommandInterface;
use Carbon\CarbonImmutable;

class Command implements CommandInterface
{
    public function __construct(
        public string $id,
        public string $title,
        public ?string $description,
        public CarbonImmutable $startAt,
        public CarbonImmutable $endAt,
    ) {
    }
}
