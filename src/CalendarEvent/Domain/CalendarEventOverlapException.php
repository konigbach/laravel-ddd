<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use RuntimeException;

class CalendarEventOverlapException extends RuntimeException
{
    /** @var int */
    protected $code = 409;

    public function __construct()
    {
        parent::__construct("There's an overlap with another event");
    }
}
