<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use Carbon\CarbonImmutable;

final class CalendarEvent
{
    private function __construct(
        public readonly string $id,
        public string $title,
        public ?string $description,
        public CarbonImmutable $startAt,
        public CarbonImmutable $endAt,
        public CarbonImmutable $repeatUntil,
        public Frequency $frequency,
        public readonly CarbonImmutable $createdAt,
    ) {
    }

    public static function create(
        string $id,
        string $title,
        ?string $description,
        CarbonImmutable $startAt,
        CarbonImmutable $endAt,
        ?RecurringPattern $recurringPattern,
    ): self {
        return new self(
            id: $id,
            title: $title,
            description: $description,
            startAt: $startAt,
            endAt: $endAt,
            repeatUntil: $recurringPattern?->repeatUntil,
            frequency: $recurringPattern?->frequency,
            createdAt: CarbonImmutable::now(),
        );
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function setStartAt(CarbonImmutable $startAt): void
    {
        $this->startAt = $startAt;
    }

    public function setEndAt(CarbonImmutable $endAt): void
    {
        $this->endAt = $endAt;
    }
}
