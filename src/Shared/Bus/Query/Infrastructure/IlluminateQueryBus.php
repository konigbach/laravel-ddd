<?php

declare(strict_types=1);

namespace Business\Shared\Bus\Query\Infrastructure;

use Business\Shared\Bus\Query\Domain\QueryBusInterface;
use Business\Shared\Bus\Query\Domain\QueryInterface;
use Illuminate\Contracts\Bus\Dispatcher;

final readonly class IlluminateQueryBus implements QueryBusInterface
{
    public function __construct(
        private Dispatcher $dispatcher
    ) {
    }

    public function dispatch(QueryInterface $query): mixed
    {
        return $this->dispatcher->dispatch($query);
    }
}
