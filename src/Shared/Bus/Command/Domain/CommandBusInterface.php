<?php

namespace Business\Shared\Bus\Command\Domain;

interface CommandBusInterface
{
    public function dispatch(CommandInterface $command): mixed;
}
