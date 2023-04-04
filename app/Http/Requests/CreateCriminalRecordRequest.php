<?php

namespace App\Http\Requests;

use App\Models\Passport;
use Illuminate\Foundation\Http\FormRequest;

class CreateCriminalRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'series' => ['required', 'integer', 'exists:'.Passport::class],
            'number' => ['required', 'integer', 'exists:'.Passport::class],
            'conviction_date' => ['required', 'date'],
            'court_name' => ['required', 'string'],
            'criminal_code' => ['required', 'integer'],
        ];
    }
}
