<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\ListCalendarEvents;

use Business\CalendarEvent\Application\UseCases\ListCalendarEvents\Query;
use Business\Shared\Bus\Query\Domain\QueryBusInterface;
use Illuminate\Http\JsonResponse;

final readonly class Action
{
    public function __construct(
        private QueryBusInterface $queryBus,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->queryBus->dispatch(new Query(
            startAt: $request->startAt(),
            endAt: $request->endAt(),
        ));

        return new JsonResponse([

        ]);
    }
}
