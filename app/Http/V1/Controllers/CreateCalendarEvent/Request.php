<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\CreateCalendarEvent;

use Business\CalendarEvent\Domain\Frequency;
use Carbon\CarbonImmutable;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_at' => 'required|date_format:Y-m-d',
            'end_at' => 'required|date_format:Y-m-d',
            'frequency' => [new Enum(Frequency::class), 'sometimes'],
            'repeat_until' => 'sometimes|date_format:Y-m-d',
        ];
    }

    public function title(): string
    {
        return $this->string('title')->toString();
    }

    public function description(): ?string
    {
        if ($this->input('description') === null) {
            return null;
        }

        return $this->string('description')->toString();
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

    public function frequency(): ?Frequency
    {
        $frequency = $this->string('frequency')->toString();

        return Frequency::tryFrom($frequency);
    }

    public function repeatUntil(): ?CarbonImmutable
    {
        if ($this->input('repeat_until') === null) {
            return null;
        }

        $repeatUntil = $this->string('repeat_until')->toString();

        return CarbonImmutable::parse($repeatUntil);
    }
}
