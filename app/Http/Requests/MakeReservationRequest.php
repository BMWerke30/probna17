<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeReservationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'checkin' => ['required', 'string', 'date_format:Y-m-d'],
            'checkout' => ['required', 'string', 'date_format:Y-m-d'],
        ];
    }
}
