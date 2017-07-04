<?php

namespace App\Http\Requests;

use App\Thread;
use Illuminate\Foundation\Http\FormRequest;

class ThreadRequest extends FormRequest
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
        switch ($this->method())
        {
            case 'POST':
                return [
                    'title' => 'required|alpha_spaces|max:80|unique:threads,title',
                    'body' => 'required',
                    'category_id' => 'required|exists:categories,id',
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'required|alpha_spaces|max:80|unique:threads,title,'.$this->thread->id,
                    'body' => 'required',
                    'category_id' => 'required|exists:categories,id',
                ];
                break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.exists' => 'The selected category is invalid',
        ];
    }
}
