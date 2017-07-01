<?php

namespace App\Http\Requests;

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
                    'title' => 'required|max:80|regex:/^[a-zA-Z0-9,.?!:() ]+$/|unique:threads,title',
                    'body' => 'required',
                ];
                break;

            case 'PUT':
            case 'PATCH':
                return [
                    'title' => 'required|max:80|regex:/^[a-zA-Z0-9,.?!:() ]+$/|unique:threads,title,'.$this->thread->id,
                    'body' => 'required',
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
            'title.regex' => 'Only letters, numbers, punctuation marks and spaces are allowed for the title.',
        ];
    }
}
