<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\ListCalendarEvents;

use Carbon\CarbonImmutable;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function authorize(): Response
    {
        return Response::allow();
    }

    /**
     * @return array<array-key, mixed>
     */
    public function rules(): array
    {
        return [
            'start_at' => 'required|date',
            'end_at' => 'required|date',
        ];
    }

    public function startAt(): CarbonImmutable
    {
        $startAt = $this->string('start_at')->toString();

        return CarbonImmutable::parse($startAt);
    }

    public function endAt(): CarbonImmutable
    {
        $endAt = $this->string('end_at')->toString();

        return CarbonImmutable::parse($endAt);
    }
}
