<?php

namespace Lexontech\Root\app\Http\Requests\Menus;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'Title'        => 'required|string'                ,
            'Link'         => 'required|string'                ,
            'parent_id'    => 'nullable|exists:root_menus,id'     ,
            'Type'         => 'required|in:footer,header'      ,
            'Status'       => 'nullable|bool'                  ,
            'Order'        => 'nullable|integer'               ,
        ];
    }
}
