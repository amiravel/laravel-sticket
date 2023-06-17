<?php

namespace Sticket\Src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewTicketRequest extends FormRequest
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
            'title' => ['required'],
            'category_id' => ['required', 'exists:categories,id'],
            'priority' => ['required', 'min:1', 'max:4'],
            'body' => ['required']
        ];
    }
}
