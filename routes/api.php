<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\V1\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$router->get('calendar-events', Controllers\ListCalendarEvents\Action::class);
$router->post('calendar-events', Controllers\CreateCalendarEvent\Action::class);
$router->put('calendar-events', Controllers\UpdateCalendarEvent\Action::class);
$router->delete('calendar-events', Controllers\DeleteCalendarEvent\Action::class);
