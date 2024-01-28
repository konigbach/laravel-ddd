<?php declare(strict_types=1);

namespace Tests\CalendarEvent\Infrastructure;

use Business\CalendarEvent\Domain\FilterCriteria;
use Business\CalendarEvent\Infrastructure\IlluminateCalendarEventRepository;
use Carbon\CarbonImmutable;
use Tests\Shared\Domain\Infrastructure\DatabaseTestCase;

class IlluminateCalendarEventRepositoryTest extends DatabaseTestCase
{
    /** @test */
    public function it_has_a_get_method(): void
    {
        $repository = new IlluminateCalendarEventRepository();

        $calendarEvents = $repository->get(new FilterCriteria(
            startAt: CarbonImmutable::yesterday(),
            endAt: CarbonImmutable::tomorrow()
        ));

        dd($calendarEvents);
    }
}
