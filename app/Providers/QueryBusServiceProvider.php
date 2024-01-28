<?php

declare(strict_types=1);

namespace App\Providers;

use Business\Shared\Bus\Query\Domain\QueryBusInterface;
use Business\Shared\Bus\Query\Infrastructure\IlluminateQueryBus;
use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Business\CalendarEvent\Application\UseCases\ListCalendarEvents;

class QueryBusServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            IlluminateQueryBus::class,
            function () {
                return new IlluminateQueryBus(
                    (new Dispatcher($this->app))->map([
                        ListCalendarEvents\Query::class => ListCalendarEvents\QueryHandler::class,
                    ])
                );
            }
        );

        $this->app->alias(IlluminateQueryBus::class, QueryBusInterface::class);
    }
}
