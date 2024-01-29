<?php

declare(strict_types=1);

namespace Tests\CalendarEvent\Infrastructure;

use Business\CalendarEvent\Domain\CalendarEvent;
use Business\CalendarEvent\Domain\FilterCriteria;
use Business\CalendarEvent\Domain\Frequency;
use Business\CalendarEvent\Domain\RecurringPattern;
use Business\CalendarEvent\Infrastructure\IlluminateCalendarEventRepository;
use Carbon\CarbonImmutable;
use Tests\Shared\Domain\Infrastructure\DatabaseTestCase;

class IlluminateCalendarEventRepositoryTest extends DatabaseTestCase
{
    /** @test */
    public function it_has_a_get_method(): void
    {
        $repository = new IlluminateCalendarEventRepository();
        $repository->persist(
            CalendarEvent::create(
                id: '1',
                title: 'title',
                description: 'description',
                startAt: CarbonImmutable::yesterday(),
                endAt: CarbonImmutable::tomorrow(),
                recurringPattern: RecurringPattern::create(
                    frequency: Frequency::DAILY->value,
                    repeatUntil: CarbonImmutable::tomorrow()
                )
            )
        );

        $calendarEvents = $repository->get(new FilterCriteria(
            startAt: CarbonImmutable::yesterday(),
            endAt: CarbonImmutable::tomorrow()
        ));
    }
}
