<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Application\UseCases\DeleteCalendarEvent;

use Business\Shared\Bus\Command\Domain\CommandInterface;

final readonly class Command implements CommandInterface
{
    public function __construct(
        public string $id,
    ) {
    }
}
