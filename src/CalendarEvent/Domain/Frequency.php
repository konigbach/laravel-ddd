<?php

declare(strict_types=1);

namespace Business\CalendarEvent\Domain;

enum Frequency: string
{
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';
}
