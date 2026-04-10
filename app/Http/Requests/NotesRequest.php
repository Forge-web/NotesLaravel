<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NotesRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        $rules = [
            'name'          => 'required|string',
            'description'   => 'required|string',
        ];
        
        switch ($this->getMethod()){
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                    'done' => 'required|boolean',
                ] + $rules;
            case 'PATCH':
                return [
                    'done'          => 'nullable|boolean',
                    'name'          => 'nullable|string',
                    'description'   => 'nullable|string',
                ];
            case 'DELETE':
                return [];

            default:
                return $rules;
        }
    }
}
