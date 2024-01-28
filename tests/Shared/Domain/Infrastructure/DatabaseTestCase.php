<?php declare(strict_types=1);

namespace Tests\Shared\Domain\Infrastructure;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class DatabaseTestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;
}
