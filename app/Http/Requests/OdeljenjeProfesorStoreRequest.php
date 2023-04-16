<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OdeljenjeProfesorStoreRequest extends FormRequest
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
            "id_profesor" => ["required", "integer", Rule::exists("profesori", "id")],
            "id_odeljenje" => ["required", "integer", Rule::exists("odeljenja", "id")]
        ];
    }
}
