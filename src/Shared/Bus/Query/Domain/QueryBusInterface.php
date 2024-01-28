<?php

namespace Business\Shared\Bus\Query\Domain;

interface QueryBusInterface
{
    public function dispatch(QueryInterface $query): mixed;
}
