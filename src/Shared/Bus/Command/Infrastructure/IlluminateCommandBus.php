<?php

namespace Business\Shared\Bus\Command\Infrastructure;

use Business\Shared\Bus\Command\Domain\CommandBusInterface;
use Business\Shared\Bus\Command\Domain\CommandInterface;
use Illuminate\Contracts\Bus\Dispatcher;

final readonly class IlluminateCommandBus implements CommandBusInterface
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {
    }

    public function dispatch(CommandInterface $command): mixed
    {
        return $this->dispatcher->dispatch($command);
    }
}
