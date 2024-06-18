<?php

namespace Lexontech\Root\app\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'lex_PhoneNumber'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11'                                ,
            'FullName'          => 'nullable|string'                                                             ,
            'ProfileURL'        => 'nullable'                                                                    ,
            'Status'            => 'required|bool'                                                               ,
            'Type'              => 'required|in:admin,author'
        ];
    }
}
