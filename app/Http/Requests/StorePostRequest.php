<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|max:140',
            'images' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'body.required' => __('app.required'),
            'body.max' => 'your tweet must be less than 140',
        ];
    }
}
