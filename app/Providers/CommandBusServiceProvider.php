<?php

declare(strict_types=1);

namespace App\Providers;

use Business\Shared\Bus\Command\Domain\CommandBusInterface;
use Business\Shared\Bus\Command\Infrastructure\IlluminateCommandBus;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Business\CalendarEvent\Application\UseCases\CreateCalendarEvent;
use Business\CalendarEvent\Application\UseCases\DeleteCalendarEvent;
use Business\CalendarEvent\Application\UseCases\UpdateCalendarEvent;

class CommandBusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            IlluminateCommandBus::class,
            function () {
                return new IlluminateCommandBus(
                    (new Dispatcher($this->app))->map([
                        CreateCalendarEvent\Command::class => CreateCalendarEvent\CommandHandler::class,
                        DeleteCalendarEvent\Command::class => DeleteCalendarEvent\CommandHandler::class,
                        UpdateCalendarEvent\Command::class => UpdateCalendarEvent\CommandHandler::class,
                    ])
                );
            }
        );

        $this->app->alias(IlluminateCommandBus::class, CommandBusInterface::class);
    }
}
