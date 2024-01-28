<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

use RuntimeException;

class CalendarEventNotExist extends RuntimeException
{
    /** @var int */
    protected $code = 404;

    /** @var string */
    protected $message = 'Calendar event not found';
}
