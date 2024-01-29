<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\CreateCalendarEvent;

use Business\CalendarEvent\Application\UseCases\CreateCalendarEvent\Command;
use Business\Shared\Bus\Command\Domain\CommandBusInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

final readonly class Action
{
    public function __construct(
        private CommandBusInterface $commandBus,
    ) {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $this->commandBus->dispatch(new Command(
            title: $request->title(),
            description: $request->description(),
            startAt: $request->startAt(),
            endAt: $request->endAt(),
        ));

        return new JsonResponse([
            'message' => 'Calendar event created successfully',
        ], Response::HTTP_CREATED);
    }
}
