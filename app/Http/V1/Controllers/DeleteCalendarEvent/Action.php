<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\DeleteCalendarEvent;

use Business\CalendarEvent\Application\UseCases\DeleteCalendarEvent\Command;
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
            id: $request->id(),
        ));

        return new JsonResponse([
            'status' => 'ok',
        ], Response::HTTP_NO_CONTENT);
    }
}
