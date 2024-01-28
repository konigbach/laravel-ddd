<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\UpdateCalendarEvent;

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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_at' => 'required|date_format:Y-m-d',
            'end_at' => 'required|date_format:Y-m-d|after_or_equal:start_at',
        ];
    }

    public function id(): string
    {
        $id = $this->route('id');
        assert(is_string($id));

        return $id;
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
}
