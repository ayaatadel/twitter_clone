<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|max:140',
            'image' => 'nullable',
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
