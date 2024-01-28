<?php

declare(strict_types=1);

namespace App\Http\V1\Controllers\DeleteCalendarEvent;

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
            'id' => 'required|uuid',
        ];
    }

    public function id(): string
    {
        return $this->string('id')->toString();
    }
}
