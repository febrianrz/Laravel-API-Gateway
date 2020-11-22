<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EndpointRequest extends FormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'path'        => 'required|string',
            'name'        => 'required',
            'description' => 'nullable',
            'url'         => 'required',
            'is_active'   => 'required|boolean'
        ];
    }
}
