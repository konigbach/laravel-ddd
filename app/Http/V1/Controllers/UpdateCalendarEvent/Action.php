<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\UpdateCalendarEvent;

use Business\CalendarEvent\Application\UseCases\UpdateCalendarEvent\Command;
use Business\Shared\Bus\Command\Domain\CommandBusInterface;
use Illuminate\Http\JsonResponse;

final readonly class Action
{
    public function __construct(
        private CommandBusInterface $commandBus,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->commandBus->dispatch(new Command(
            id: $request->id(),
            title: $request->title(),
            description: $request->description(),
            startAt: $request->startAt(),
            endAt: $request->endAt(),
        ));

        return new JsonResponse([
            'status' => 'ok',
        ]);
    }
}
