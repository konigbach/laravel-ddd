<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Infrastructure;

use Business\CalendarEvent\Domain\CalendarEvent;
use Business\CalendarEvent\Domain\CalendarEventRepository;
use Business\CalendarEvent\Domain\FilterCriteria;
use Illuminate\Support\Facades\DB;

/**
 * @phpstan-type CalendarEventRecord object{
 *     id: string,
 *     title: string,
 *     description: string,
 *     startAt: \Carbon\CarbonImmutable,
 *     endAt: \Carbon\CarbonImmutable,
 *     createdAt: \Carbon\CarbonImmutable,
 * }
 */
class IlluminateCalendarEventRepository implements CalendarEventRepository
{
    public function get(?FilterCriteria $filterCriteria = null): array
    {
        $query = DB::table('calendar_events');

        if ($filterCriteria !== null) {
            $query->where('start_at', '>=', $filterCriteria->startAt)
                ->where('end_at', '<=', $filterCriteria->endAt);
        }

        /** @var array<CalendarEventRecord> */
        $calendarEvents = $query->get()->toArray();

        return array_map(function (object $calendarEvent) {
            return CalendarEvent::create(
                id: $calendarEvent->id,
                title: $calendarEvent->title,
                description: $calendarEvent->description,
                startAt: $calendarEvent->startAt,
                endAt: $calendarEvent->endAt,
            );
        }, $calendarEvents);
    }

    public function persist(CalendarEvent $calendarEvent): void
    {
        DB::table('calendar_events')
            ->updateOrInsert(['id' => $calendarEvent->id], [
                'title' => $calendarEvent->title,
                'description' => $calendarEvent->description,
                'start_at' => $calendarEvent->startAt,
                'end_at' => $calendarEvent->endAt,
                'created_at' => $calendarEvent->createdAt,
            ]);
    }

    public function delete(string $calendarEventId): void
    {
        DB::table('calendar_events')
            ->where('id', '=', $calendarEventId)
            ->delete();
    }

    public function find(string $id): ?CalendarEvent
    {
        /** @var CalendarEventRecord|null */
        $calendarEvent = DB::table('calendar_events')
            ->where('id', '=', $id)
            ->first();

        if ($calendarEvent === null) {
            return null;
        }

        return CalendarEvent::create(
            id: $calendarEvent->id,
            title: $calendarEvent->title,
            description: $calendarEvent->description,
            startAt: $calendarEvent->startAt,
            endAt: $calendarEvent->endAt,
        );
    }

    public function overlappingEventsExist(CalendarEvent $calendarEvent): bool
    {
        return DB::table('calendar_events')
            ->where('id', '<>', $calendarEvent->id)
            ->where(function ($query) use ($calendarEvent) {
                $query->where('start_at', '<', $calendarEvent->endAt)
                    ->where('end_at', '>', $calendarEvent->startAt);
            })
            ->exists();
    }
}
