<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PredmetProfesorStoreRequest extends FormRequest
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
            "id_profesor" => ["required", "integer", Rule::exists("profesori", "id"), Rule::unique('odeljenje_profesor')->where(function ($query) {
                return $query->where('id_odeljenje', $this->get('id_odeljenje'));
            })],
            "id_predmet" => ["required", "integer", Rule::exists("predmeti", "id"), Rule::unique('odeljenje_predmet')->where(function ($query) {
                return $query->where('id_odeljenje', $this->get('id_odeljenje'));
            })],
            "id_odeljenje" => ["required", "integer", Rule::exists("odeljenja", "id")]
        ];
    }
}
