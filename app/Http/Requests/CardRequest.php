<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'question' => 'required|string|min:8',
            'response' => 'required|string|min:8',
            'matiere_id' => 'required|integer',
            'public' => 'boolean',
            'card_chapitre_id' => 'required|integer',
            'card_level_id' => 'required|integer',
            'card_semestre_id' => 'required|integer',
            'created_by' => 'string',
            'validated_by' => 'string',
            'user_id' => 'integer'
        ];
    }

    public function prepareForValidation() { 
        $this->merge([
            'question' => $this->question,
            'response' => $this->response,
            'matiere_id' => $this->matiere_id,
            'card_chapitre_id' => $this->card_chapitre_id,
            'card_level_id' => $this->card_level_id,
            'card_semestre_id' => $this->card_semestre_id,
        ]);
    }
}
