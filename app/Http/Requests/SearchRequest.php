<?php

namespace App\Http\Requests;

use App\Models\Enums\ComicStatus;
use App\Models\Enums\ComicType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            's' => ['sometimes', 'string'],
            'type' => ['sometimes', Rule::enum(ComicType::class)],
            'status' => ['sometimes', Rule::enum(ComicStatus::class)],
        ];
    }
}
